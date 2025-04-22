<div class="row">
  @foreach ($projects as $project)
  <!-- item:begin -->
  <div class="col-6 col-md-12">
     <a href="#" target="_blank">
        <div class="item">
           <div class="card_body">
              <img src="{{asset('storage/projects/'.$project->image)}}" alt="{{$project->project_name}}">
              <div class="website-info py-1 d-flex justify-between items-center">
                 <div class="left">
                    <h4 class="category text-heaven fs-big">{{$project->project_name}}</h4>
                    <h6 class="website-name text-heaven fs-point8 fw-normal">{{$project->service->title}}</h6>
                 </div>
                 <div class="right">
                    <a href="#"><i class="fa-solid fa-arrow-right-long"></i></a>
                 </div>
              </div>
           </div>
        </div>
     </a>
  </div>

  @endforeach
</div>