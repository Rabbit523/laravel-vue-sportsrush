@extends('layout')

@section('content')
    <link href="{{asset('js/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.css')}}" type="text/css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
    <script src="{{asset('js/Date-Time-Picker-Bootstrap-4/src/js/bootstrap-datetimepicker.js')}}"></script>



    <script type="text/javascript">
        $(function () {
            $('#starting_time').datetimepicker();
            $('#ending_time').datetimepicker() ;

        });


    </script>

    <div class="container py-3">

        <?php
          $event = \App\Event::find(app('request')->get('event_id')) ;

          if($event != null) {
        ?>

        <div class="row">

             <div class="offset-md-3 col-md-6">
                 {{\App\Http\Controllers\PagesHandler::notification()}}

                 <h2 class="font-weight-bold mb-2">
                     <strong>Edit Event ({{$event->name}})</strong>
                 </h2>

                 <form action="{{route('event.update')}}" method="post" enctype="multipart/form-data">
                     {{csrf_field()}}
                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group">

                                <label>Event Name</label>
                                <input type="text" class="form-control" name="name" required placeholder="Team name" value="{{$event->name}}">
                            </div>
                            
                        </div>

                    </div>

                     <div class="row">

                         <div class="col-md-6">

                             <div class="form-group">

                                 <label>Type of Sport</label>

                                 <select required name="type" class="form-control">

                                     <option value="">Select</option>

                                     <option @if($event->type == 'Golf')
                                           selected  @endif>Golf</option>
                                     <option @if($event->type == 'Tennis')
                                             selected  @endif>Tennis</option>
                                     <option @if($event->type == 'Football')
                                             selected  @endif>Football</option>
                                     <option @if($event->type == 'Basketball')
                                             selected  @endif>Basketball</option>

                                 </select>

                             </div>

                         </div>

                         <div class="col-md-6">

                             <div class="form-group">

                                 <label>Maximum number of members</label>
                                 <input value="{{$event->no_members}}" type="number" required name="no_members" class="form-control">
                             </div>

                         </div>

                     </div>
                     <div class="row">
                         <div class="col-md-12">

                              <div class="form-group">

                                  <label>Recurring Period ( If recurring )</label>
                                  <select  class="form-control" name="recurring">
                                      <option value="" @if($event->recurring == '') selected  @endif>No Recurring</option>
                                      <option @if($event->recurring == 'daily') selected  @endif value="daily">Daily</option>
                                      <option @if($event->recurring == 'weekly') selected  @endif value="weekly">Weekly</option>
                                      <option @if($event->recurring == 'monthly') selected  @endif value="monthly">Monthly</option>
                                  </select>
                              </div>
                         </div>

                     </div>
                     <div class="row">

                         <div class="col-md-6">

                             <div class="form-group">

                                 <label>Starting Date time</label>
                                 <input name="starting_time" required type="text" id="starting_time" value="{{$event->starting_time}}" class="form-control" onload="pickDateTime('#starting_time')">
                             </div>

                         </div>

                         <div class="col-md-6">

                             <div class="form-group">

                                 <label>Ending Date time</label>
                                 <input name="ending_time" required type="text" class="form-control" value="{{$event->ending_time}}" id="ending_time">
                             </div>

                         </div>

                     </div>
                     <div class="row">

                         <div class="col-md-12">


                             <div class="form-group">

                                 <label>Event Description</label>
                                 <textarea name="details" required class="form-control" placeholder="Enter team details here ...">{!! html_entity_decode($event->details) !!}</textarea>
                             </div>


                         </div>

                     </div>

                     <div class="row">

                         <div class="col-md-12">


                             <h4 class="font-weight-bold mb-2">
                                 <strong>Location</strong>
                             </h4>



                         </div>

                     </div>

                     <div class="row">

                         <div class="col-md-6">

                             <div class="form-group">

                                 <label>Country</label>
                                 <select required name="country" class="form-control" id="country"></select>
                             </div>



                         </div>
                         <div class="col-md-6">

                             <div class="form-group">

                                 <label>State</label>
                                 <select required name="state"  class="form-control" id="state">  </select>
                             </div>

                            <script type="text/javascript">
                                populateCountries('country','state') ;
                            </script>

                             <script type="text/javascript">

                                 $('#country').val('{{$event->country}}')

                             </script>
                             <script type="text/javascript">

                                 populateStates('country','state') ;
                             </script>

                             <script type="text/javascript">
                                 $('#state').val('{{$event->state}}')
                             </script>


                         </div>

                     </div>

                     <div class="row">

                         <div class="col-md-6">

                             <div class="form-group">

                                 <label>City</label>
                                 <input name="city" required type="text" class="form-control" placeholder="City" value="{{$event->city}}">
                             </div>



                         </div>
                         <div class="col-md-6">

                             <div class="form-group">

                                 <label>Zip Code</label>
                                 <input name="zip" required type="text" class="form-control" placeholder="Zip" value="{{$event->zip}}">
                             </div>



                         </div>

                     </div>

                     <div class="row">

                         <div class="col-md-12">

                             <div class="form-group">

                                 <label>Area</label>
                                 <input name="area" required type="text" class="form-control" placeholder="Area" value="{{$event->area}}">
                             </div>



                         </div>

                     </div>
                     <div class="row">

                         <div class="col-md-12">

                             <div class="form-group">

                                 <div class="custom-control custom-radio custom-control-inline">
                                     <input type="radio" required id="customRadioInline1" value="Public" @if($event->access_type == 'Public') checked   @endif name="access_type" class="custom-control-input">
                                     <label class="custom-control-label" for="customRadioInline1">Public Event</label>
                                 </div>
                                 <div class="custom-control custom-radio custom-control-inline">
                                     <input @if($event->access_type == 'Private') checked   @endif  required type="radio" id="customRadioInline2" value="Private" name="access_type" class="custom-control-input">
                                     <label class="custom-control-label" for="customRadioInline2">Private Event</label>
                                 </div>

                             </div>
                         </div>
                     </div>


                     <div class="row">
                         <div class="col-md-3">

                             <img src="{{url('storage/app')}}/{{$event->img_url}}" class="img-fluid">

                         </div>
                         <div class="col-md-12">

                             <div class="form-group">
                                 <label>Change Photo</label>
                                 <input  name="img" accept="image/*" type="file" class="form-control">

                             </div>
                         </div>
                     </div>


                     <div class="row">
                        <input type="hidden" name="event_id" value="{{$event->id}}">
                         <div class="col-md-12">

                             <div class="form-group">

                                 <button type="submit" class="btn btn-primary btn-block btn-lg">
                                     Update Event
                                 </button>

                             </div>
                         </div>
                     </div>







                 </form>

             </div>


        </div>
         <?php

           } else {

              ?>
               <div class="row">

                   <div class="col-md-12">

                       <div class="alert alert-danger">
                           Event not found with the requested ID !
                       </div>

                   </div>

               </div>
            <?php

            }
         ?>
    </div>

@endsection
