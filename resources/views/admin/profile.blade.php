@extends('admin.layout')


@section('content')


       <?php

       $user = \App\User::find(app('request')->get('user_id')) ;

       if($user == null)

           {

               ?>

            <div class="row">
                  <div class="col-md-12">
                        <div class="alert alert-danger">
                            User not found with requested ID
                        </div>
                  </div>
            </div>
       <?php
           } else {

       ?>

        <div class="row">

            <div class="col-md-12">
                {{\App\Http\Controllers\PagesHandler::notification()}}
                <h2 class=" font-weight-bold"><strong>{{$user->first_name}}'s Profile</strong></h2>

                <form class="font-weight-bold">
                    {{csrf_field()}}
                    <div class="row">

                        <div class="col-md-12">



                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>First Name</label>

                                        <input name="first_name" type="text" class="form-control" required value="{{$user->first_name}}">
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Last Name</label>

                                        <input name="last_name" required type="text" class="form-control" value="{{$user->last_name}}">
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

                                        <input type="email" class="form-control" name="email" required value="{{$user->email}}">
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Birthday</label>

                                        <input type="date" class="form-control" name="date_birth" required value="{{$user->date_birth}}">
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

                                        <input type="password" class="form-control" name="password" >
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Confirm Password</label>

                                        <input type="password" class="form-control" name="password_confirmation" >
                                    </div>
                                </div>


                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Country</label>

                                        <select id="country" class="form-control" name="country" required value="{{$user->country}}">    </select>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>State</label>

                                        <select id="state" class="form-control" name="state" value="{{$user->state}}">    </select>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    populateCountries("country", "state");

                                </script>
                                <script type="text/javascript">
                                    $('#country').val('{{$user->country}}')
                                </script>
                                <script type="text/javascript">
                                    populateStates("country", "state");

                                </script>
                                <script type="text/javascript">
                                    $('#state').val('{{$user->country}}')
                                </script>
                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>City</label>

                                        <input type="text" class="form-control" name="city" required value="{{$user->city}}">
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Zip</label>

                                        <input type="text" class="form-control" name="zip" required value="{{$user->zip}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Street</label>

                                        <input type="text" class="form-control" name="street" value="{{$user->street}}">
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









                        </div>

                    </div>

                    <div class="form-group">


                        <button type="submit" class="btn btn-primary btn-block btn-lg">Update Profile</button>

                    </div>

                </form>


            </div>

        </div>

       <?php

       }

       ?>

@endsection

