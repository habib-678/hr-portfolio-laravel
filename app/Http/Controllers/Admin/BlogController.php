<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    // index
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Blog::query();

            return DataTables::of($data)
                    ->addIndexColumn()

                    ->editColumn('created_at', function($row){
                        return $row->created_at->diffForHumans();
                    })
                    ->editColumn('content', function($row){
                        return Str::limit(strip_tags($row->content), 50);
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="d-flex justify-content-start flex-shrink-0">
                        <a href="javascript:;" onclick="edit('.$row->id.')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <a href="javascript:;" onclick="deleteBlog('.$row->id.')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                    </div>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'content', 'created_at'])
                    ->make(true);
        }
        return view('backend.blogs.index');
    }

    // Store Blog Data
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'             => 'required',
            'author'            => 'required',
            'content'           => 'required',
            'is_published'      => 'required',
            'thumbnail'         => 'mimes:jpg,bmp,png,jpeg,webp','max:2048',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        }else{
            //update
            if(isset($request->id) && ($blog = Blog::find($request->id))) { 
                $blog->title            = $request->input('title');
                $blog->slug             = Str::slug($request->input('title'));
                $blog->author           = $request->input('author');
                $blog->meta_description = $request->input('meta_description');
                $blog->meta_title       = $request->input('meta_title');
                $blog->meta_keywords    = $request->input('meta_keywords');
                $blog->is_published     = $request->input('is_published');
                $blog->updated_at       = Carbon::now();

                //Clean HTML with Summernote
                $content = $request->input('content');
                $cleanHtml = saveSummernoteImages($content);

                //Remove old image paths
                removeImagePaths($blog->content, $cleanHtml, '/storage/blogs/');

                // Now you can store it safely
                $blog->content = $cleanHtml;

                //image upload
                if($request->file('thumbnail')){
                    //unlink old file
                    $photo_path = public_path($blog->thumbnail);
                    if (file_exists($photo_path) && $blog->thumbnail != '') {
                        unlink($photo_path);
                    }

                    $image = $request->file('thumbnail');
                    $image_name = time() . '.' . $image->getClientOriginalExtension();

                    // Save to storage/app/public/blogs
                    $destinationPath = storage_path('app/public/blogs');
                    $image->move($destinationPath, $image_name);

                    // Save path relative to public (so asset() works)
                    $blog->thumbnail = 'storage/blogs/' . $image_name;

                }
                // Update the blog
                if ($blog->update()){
                    return response()->json([
                        'success' => true,
                        'message'=> 'Blog updated successfully!'
                    ], 200);
                }else{
                    return response()->json([
                        'error' => true,
                        'message' => 'Failed!.'
                    ], 400);

                }

            }else{ 
                //create new
                $blog = new Blog();
                $blog->title            = $request->input('title');
                $blog->slug             = Str::slug($request->input('title'));
                $blog->author           = $request->input('author');
                $blog->meta_keywords    = $request->input('meta_keywords');
                $blog->meta_description = $request->input('meta_description');
                $blog->meta_title       = $request->input('meta_title');
                $blog->is_published     = (bool) $request->input('is_published');
                $blog->created_at       = now();
                $blog->thumbnail        = ''; 

                //Clean HTML with Summernote
                $content = $request->input('content');
                $cleanHtml = saveSummernoteImages($content);
                // Now you can store it safely
                $blog->content = $cleanHtml;

                //image upload
                if($request->file('thumbnail')){
                    $image = $request->file('thumbnail');
                    $image_name = time() . '.' . $image->getClientOriginalExtension();

                    // Save to storage/app/public/blogs
                    $destinationPath = storage_path('app/public/blogs');
                    $image->move($destinationPath, $image_name);

                    // Store publicly accessible path (after storage:link)
                    $blog->thumbnail = 'storage/blogs/' . $image_name;
                }
                //save blog
                if ($blog->save())
                {
                    return response()->json([
                        'success' => true,
                        'message'=> "Blog saved successfully!"
                    ], 200);
                }else{
                    return response()->json([
                        'error' => true,
                        'message' => "Failed!"
                    ], 400);

                }

            }

        }

    }

    //getBlog
    public function getBlog($id)
    {
        $data = Blog::findOrFail($id);
        return response()->json(['data' => $data]);
    }

    // delete blog
    public function delete($id)
    {
        $blog = Blog::find($id);

        // Delete thumbnail
        if ($blog->thumbnail) {
            $thumbPath = public_path($blog->thumbnail);
            if (file_exists($thumbPath)) {
                unlink($thumbPath);
            }
        }

        // Remove embedded content images
        if ($blog->content) {
            preg_match_all('/<img[^>]+src="([^">]+)"/i', $blog->content, $matches);
            $imagePaths = $matches[1] ?? [];

            foreach ($imagePaths as $path) {
                $fullPath = public_path(parse_url($path, PHP_URL_PATH));
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            }
        }

        $blog->delete();

        return response()->json([
            'success' => true,
            'message' => 'Blog deleted successfully!'
        ], 200);
    }

}
