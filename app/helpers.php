<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


if(!function_exists('saveSummernoteImages')) {
    function saveSummernoteImages($htmlContent, $uploadFolder = 'blogs/')
    {
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true); // suppress HTML5 warnings
        $dom->loadHTML(mb_convert_encoding($htmlContent, 'HTML-ENTITIES', 'UTF-8'));

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            $src = $img->getAttribute('src');

            // Check if image is base64
            if (preg_match('/^data:image\/(\w+);base64,/', $src, $type)) {
                $imageData = substr($src, strpos($src, ',') + 1);
                $imageData = base64_decode($imageData);
                $imageExtension = strtolower($type[1]);

                $imageName = Str::random(10) . '.' . $imageExtension;
                $storagePath = $uploadFolder . $imageName;

                // Ensure folder exists
                if (!Storage::disk('public')->exists($uploadFolder)) {
                    Storage::disk('public')->makeDirectory($uploadFolder);
                }

                // Save image file
                Storage::disk('public')->put($storagePath, $imageData);

                // Replace <img src> with proper URL
                $img->setAttribute('src', Storage::url($storagePath));
            }
        }

        // Get cleaned HTML
        return $dom->saveHTML($dom->getElementsByTagName('body')->item(0));
    }
}
if(!function_exists('extractImagePaths')) {
    function extractImagePaths($htmlContent, $basePath = '/storage/blogs/')
    {
        $imagePaths = [];

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($htmlContent, 'HTML-ENTITIES', 'UTF-8'));

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            $src = $img->getAttribute('src');

            if (Str::startsWith($src, $basePath)) {
                $imagePaths[] = str_replace('/storage/', '', $src); // 'uploads/blogs/xxx.png'
            }
        }

        return $imagePaths;
    }
}
if(!function_exists('removeImagePaths')) {
    function removeImagePaths($oldContent, $newContent, $basePath = '/storage/blogs/')
    {
        // 1. Extract old image paths
        $oldImagePaths = extractImagePaths($oldContent);

        // 2. Extract new image paths
        $newImagePaths = extractImagePaths($newContent);

        // 3. Detect and delete unused (orphaned) images
        $orphanedImages = array_diff($oldImagePaths, $newImagePaths);

        // 4. Delete orphaned images
        foreach ($orphanedImages as $imagePath) {
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
        }
    }
}

