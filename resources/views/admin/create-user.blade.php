@extends('admin.layout')

@section('content')

        <div class="row">

             <div class="offset-md-3 col-md-6">

                 <h4 class="font-weight-bold mb-2">
                     <strong>Create New User</strong>
                 </h4>

                 <form action="{{route('site.register')}}" method="post" enctype="multipart/form-data">
                     {{csrf_field()}}


                         <div class="row">

                             <div class="col-md-12">



                                 <div class="row">

                                     <div class="col-md-6">

                                         <div class="form-group">
                                             <label>First Name</label>

                                             <input name="first_name" type="text" class="form-control" required value="{{old('first_name')}}">
                                         </div>
                                     </div>

                                     <div class="col-md-6">

                                         <div class="form-group">
                                             <label>Last Name</label>

                                             <input name="last_name" required type="text" class="form-control" value="{{old('last_name')}}">
                                         </div>
                                     </div>


                                 </div>

                                 <div class="row">

                                     <div class="col-md-6">
                                         @if($errors->has('email'))
                                             <div class="alert alert-danger">
                                                 {{$errors->first('email')}}
                                             </div>
                                         @endif
                                         <div class="form-group">
                                             <label>Email</label>

                                             <input type="email" class="form-control" name="email" required value="{{old('email')}}">
                                         </div>
                                     </div>

                                     <div class="col-md-6">

                                         <div class="form-group">
                                             <label>Birthday</label>

                                             <input type="date" class="form-control" name="date_birth" required value="{{old('date_birth')}}">
                                         </div>
                                     </div>


                                 </div>

                                 <div class="row">
                                     @if($errors->has('password'))
                                         <div class="col-md-12">

                                             <div class="alert alert-danger">
                                                 {{$errors->first('password')}}
                                             </div>
                                         </div>
                                     @endif
                                     <div class="col-md-6">

                                         <div class="form-group">
                                             <label>Password</label>

                                             <input type="password" class="form-control" name="password" required>
                                         </div>
                                     </div>

                                     <div class="col-md-6">

                                         <div class="form-group">
                                             <label>Confirm Password</label>

                                             <input type="password" class="form-control" name="password_confirmation" required>
                                         </div>
                                     </div>


                                 </div>

                                 <div class="row">

                                     <div class="col-md-6">

                                         <div class="form-group">
                                             <label>Country</label>

                                             <select id="country" class="form-control" name="country" required value="{{old('country')}}">    </select>
                                         </div>
                                     </div>

                                     <div class="col-md-6">

                                         <div class="form-group">
                                             <label>State</label>

                                             <select id="state" class="form-control" name="state" value="{{old('state')}}"></select>
                                         </div>
                                     </div>

                                     <script type="text/javascript">
                                         populateCountries("country", "state");

                                     </script>

                                    <script type="text/javascript">
                                        $('#country').val('{{old('country')}}')
                                    </script>
                                 </div>

                                 <div class="row">

                                     <div class="col-md-6">

                                         <div class="form-group">
                                             <label>City</label>

                                             <input type="text" class="form-control" name="city" required value="{{old('city')}}">
                                         </div>
                                     </div>

                                     <div class="col-md-6">

                                         <div class="form-group">
                                             <label>Zip</label>

                                             <input type="text" class="form-control" name="zip" required value="{{old('zip')}}">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">

                                     <div class="col-md-6">

                                         <div class="form-group">
                                             <label>Street</label>

                                             <input type="text" class="form-control" name="street" value="{{old('street')}}">
                                         </div>
                                     </div>

                                     <div class="col-md-6">

                                         <div  class="form-group">
                                             <label>Interest</label>

                                             <select class="mdb-select" name="interest" required>
                                                 <option value="">Select </option>
                                                 <option>Tennis</option>
                                                 <option>Golf</option>
                                                 <option>Football</option>
                                                 <option>Basketball</option>


                                             </select>
                                         </div>
                                     </div>


                                 </div>

                                 <div class="row">


                                     <div class="col-md-12">

                                         <div  class="form-group">
                                             <label>Role of User</label>

                                             <select class="mdb-select" name="role" required>
                                                 <option value="">Select </option>
                                                 <option value="user">User</option>
                                                 <option value="admin">Administrator</option>


                                             </select>
                                         </div>
                                     </div>


                                 </div>


                                 <div class="row">

                                     <div class="col-md-12">


                                         <div class="form-group">


                                             <button type="submit" class="btn btn-primary btn-block btn-lg" >Register</button>


                                         </div>

                                     </div>


                                 </div>







                             </div>

                         </div>



                 </form>
             </div>


        </div>


@endsection
