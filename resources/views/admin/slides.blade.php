@extends('admin.layout')

@section('content')
    <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>

    <div class="row">
            <?php

              $slides = \App\Slide::orderBy('order','asc')->get() ;
        ?>
             <div class="col-md-12">

                 <h4 class="font-weight-bold mb-2">
                     <strong>Manage Slides</strong>
                 </h4>

                 <div class="row">

                     @foreach($slides as $slide)

                         <div class="col-md-3 text-center">

                              <img src="{{$slide->img_url}}" class="img-fluid">
                             <br/>
                             <a href="{{route('admin.slides.delete',['slide_id' => $slide->id ])}}" class="btn btn-danger">
                                 <i class="fa fa-trash"></i>
                             </a>
                         </div>

                     @endforeach

                 </div>
                 <form action="{{route('admin.slides.save')}}" method="post" enctype="multipart/form-data">
                     {{csrf_field()}}


                     <div class="row">

                         <div class="col-md-12">

                             <div class="form-group">

                                 <label >Upload Photos</label>

                             </div>

                             <div class="form-group">

                                 <input required type="file" name="slide[]" class="form-control" accept="image/*">

                             </div>
                             <div class="form-group">

                                 <input  type="file" name="slide[]" class="form-control" accept="image/*">

                             </div>
                             <div class="form-group">

                                 <input  type="file" name="slide[]" class="form-control" accept="image/*">

                             </div>
                             <div class="form-group">

                                 <input  type="file" name="slide[]" class="form-control" accept="image/*">

                             </div>
                             <div class="form-group">

                                 <input type="file" name="slide[]" class="form-control" accept="image/*">

                             </div>

                         </div>


                     </div>

                     <div class="row">

                         <div class="col-md-12">

                             <div class="form-group">

                                 <button type="submit" class="btn btn-primary btn-block btn-lg">
                                     Start Upload
                                 </button>

                             </div>
                         </div>
                     </div>







                 </form>

             </div>


        </div>


@endsection
