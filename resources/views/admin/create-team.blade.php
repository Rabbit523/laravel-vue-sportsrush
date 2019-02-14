@extends('admin.layout')

@section('content')

        <div class="row">

             <div class="offset-md-3 col-md-6">

                 <h4 class="font-weight-bold mb-2">
                     <strong>Create team</strong>
                 </h4>

                 <form action="{{route('team.register')}}" method="post" enctype="multipart/form-data">
                     {{csrf_field()}}
                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group">

                                <label>Team Name</label>
                                <input name="name" required type="text" class="form-control" placeholder="Team name">
                            </div>
                            
                        </div>

                    </div>

                     <div class="row">

                         <div class="col-md-12">

                             <div class="form-group">

                                 <label>Type of team</label>

                                 <select required name="type" class="form-control">

                                     <option value="">Select</option>

                                     <option>Golf</option>
                                     <option>Tennis</option>
                                     <option>Football</option>
                                     <option>Basketball</option>

                                 </select>

                             </div>

                         </div>

                     </div>

                     <div class="row">

                         <div class="col-md-12">


                             <div class="form-group">

                                 <label>Team Description</label>
                                 <textarea required name="details" class="form-control" placeholder="Enter team details here ..."></textarea>
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
                                 <input name="country" required type="text" class="form-control" placeholder="Country">
                             </div>



                         </div>
                         <div class="col-md-6">

                             <div class="form-group">

                                 <label>State</label>
                                 <input name="state" required type="text" class="form-control" placeholder="State">
                             </div>



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
                                     <input type="radio" id="customRadioInline1" name="access_type" required value="Public" class="custom-control-input">
                                     <label class="custom-control-label" for="customRadioInline1">Public Team</label>
                                 </div>
                                 <div class="custom-control custom-radio custom-control-inline">
                                     <input type="radio" id="customRadioInline2" name="access_type" required value="Private" class="custom-control-input">
                                     <label class="custom-control-label" for="customRadioInline2">Private Team</label>
                                 </div>

                             </div>
                         </div>
                     </div>


                     <div class="row">

                         <div class="col-md-12">

                             <div class="form-group">
                                 <label>Upload Photo</label>
                                 <input name="img" accept="image/*" required type="file" class="form-control">

                             </div>
                         </div>
                     </div>


                     <div class="row">

                         <div class="col-md-12">

                             <div class="form-group">

                                 <button type="submit" class="btn btn-primary btn-block btn-lg">
                                     Create Team
                                 </button>

                             </div>
                         </div>
                     </div>







                 </form>

             </div>


        </div>


@endsection
