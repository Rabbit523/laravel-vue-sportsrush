@extends('admin.layout')

@section('content')
    <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>

    <div class="row">
            <?php

              $cms = \App\CMS::find(1) ;
        ?>
             <div class="col-md-12">

                 <h4 class="font-weight-bold mb-2">
                     <strong>Manage Contents</strong>
                 </h4>

                 <form action="{{route('admin.cms.update')}}" method="post" enctype="multipart/form-data">
                     {{csrf_field()}}

                     <div class="row">

                         <div class="col-md-12">

                             <div class="form-group">

                                 <label>Text ( Who are we page )</label>

                                 <textarea class="form-control" name="who_are_we" required>{!! html_entity_decode($cms->who_are_we) !!}</textarea>
                                 <script type="text/javascript">
                                     CKEDITOR.replace('who_are_we') ;
                                 </script>
                             </div>


                         </div>


                     </div>

                     <div class="row">

                         <div class="col-md-12">

                             <div class="form-group">

                                 <label>Text ( About us page )</label>

                                 <textarea class="form-control" name="about_us" required>{!! html_entity_decode($cms->about_us) !!}</textarea>
                                 <script type="text/javascript">
                                     CKEDITOR.replace('about_us') ;
                                 </script>
                             </div>


                         </div>


                     </div>


                     <div class="row">

                         <div class="col-md-12">

                             <div class="form-group">

                                 <button type="submit" class="btn btn-primary btn-block btn-lg">
                                     Update
                                 </button>

                             </div>
                         </div>
                     </div>







                 </form>

             </div>


        </div>


@endsection
