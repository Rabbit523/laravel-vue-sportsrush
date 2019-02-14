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
        <div class="row">

             <div class="offset-md-3 col-md-6">
                 {{\App\Http\Controllers\PagesHandler::notification()}}

                 <h2 class="font-weight-bold mb-2">
                     <strong>Create Event</strong>
                 </h2>

                 <form action="{{route('event.register')}}" method="post" enctype="multipart/form-data">
                     {{csrf_field()}}
                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group">

                                <label>Event Name</label>
                                <input type="text" class="form-control" name="name" required placeholder="Team name">
                            </div>
                            
                        </div>

                    </div>

                     <div class="row">

                         <div class="col-md-6">

                             <div class="form-group">

                                 <label>Type of Sport</label>

                                 <select required name="type" class="form-control">

                                     <option value="">Select</option>

                                     <option>Golf</option>
                                     <option>Tennis</option>
                                     <option>Football</option>
                                     <option>Basketball</option>

                                 </select>

                             </div>

                         </div>

                         <div class="col-md-6">

                             <div class="form-group">

                                 <label>Maximum number of members</label>
                                 <input type="number" required name="no_members" class="form-control">
                             </div>

                         </div>

                     </div>
                     <div class="row">
                         <div class="col-md-12">

                              <div class="form-group">

                                  <label>Recurring Period ( If recurring )</label>
                                  <select  class="form-control" name="recurring">
                                      <option value="">No Recurring</option>
                                      <option value="daily">Daily</option>
                                      <option value="weekly">Weekly</option>
                                      <option value="monthly">Monthly</option>
                                  </select>
                              </div>
                         </div>

                     </div>
                     <div class="row">

                         <div class="col-md-6">

                             <div class="form-group">

                                 <label>Starting Date time</label>
                                 <input name="starting_time" required type="text" id="starting_time" class="form-control" onload="pickDateTime('#starting_time')">
                             </div>

                         </div>

                         <div class="col-md-6">

                             <div class="form-group">

                                 <label>Ending Date time</label>
                                 <input name="ending_time" required type="text" class="form-control" id="ending_time">
                             </div>

                         </div>

                     </div>
                     <div class="row">

                         <div class="col-md-12">


                             <div class="form-group">

                                 <label>Event Description</label>
                                 <textarea name="details" required class="form-control" placeholder="Enter team details here ..."></textarea>
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

                         </div>

                     </div>

                     <div class="row">

                         <div class="col-md-6">

                             <div class="form-group">

                                 <label>City</label>
                                 <input name="city" required type="text" class="form-control" placeholder="City">
                             </div>



                         </div>
                         <div class="col-md-6">

                             <div class="form-group">

                                 <label>Zip Code</label>
                                 <input name="zip" required type="text" class="form-control" placeholder="Zip">
                             </div>



                         </div>

                     </div>

                     <div class="row">

                         <div class="col-md-12">

                             <div class="form-group">

                                 <label>Area</label>
                                 <input name="area" required type="text" class="form-control" placeholder="Area">
                             </div>



                         </div>

                     </div>
                     <div class="row">

                         <div class="col-md-12">

                             <div class="form-group">

                                 <div class="custom-control custom-radio custom-control-inline">
                                     <input type="radio" required id="customRadioInline1" value="Public" name="access_type" class="custom-control-input">
                                     <label class="custom-control-label" for="customRadioInline1">Public Event</label>
                                 </div>
                                 <div class="custom-control custom-radio custom-control-inline">
                                     <input required type="radio" id="customRadioInline2" value="Private" name="access_type" class="custom-control-input">
                                     <label class="custom-control-label" for="customRadioInline2">Private Event</label>
                                 </div>

                             </div>
                         </div>
                     </div>


                     <div class="row">

                         <div class="col-md-12">

                             <div class="form-group">
                                 <label>Upload Photo</label>
                                 <input required name="img" accept="image/*" type="file" class="form-control">

                             </div>
                         </div>
                     </div>


                     <div class="row">

                         <div class="col-md-12">

                             <div class="form-group">

                                 <button type="submit" class="btn btn-primary btn-block btn-lg">
                                     Create Event
                                 </button>

                             </div>
                         </div>
                     </div>







                 </form>

             </div>


        </div>

    </div>

@endsection
