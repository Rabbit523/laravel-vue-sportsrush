@extends('layout')


@section('content')

    <div class="container-fluid py-5">
        <div class="row">

            <div class="offset-md-2 col-md-8">
                {{\App\Http\Controllers\PagesHandler::notification()}}
                <h2 class=" font-weight-bold"><strong>My Profile</strong></h2>

                <form action="{{route('profile.update')}}" method="post" class="font-weight-bold">

                    {{csrf_field()}}
                    <div class="row">

                        <div class="col-md-12">



                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>First Name</label>

                                        <input name="first_name" type="text" class="form-control" required value="{{Auth::user()->first_name}}">
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Last Name</label>

                                        <input name="last_name" required type="text" class="form-control" value="{{Auth::user()->last_name}}">
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

                                        <input type="email" class="form-control" name="email" required value="{{Auth::user()->email}}">
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Birthday</label>

                                        <input type="date" class="form-control" name="date_birth" required value="{{Auth::user()->date_birth}}">
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

                                        <select class="form-control" name="country" id="country" required value="{{Auth::user()->country}}"> </select>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>State</label>

                                        <select class="form-control" name="state" id="state" value="{{Auth::user()->state}}"> </select>
                                    </div>
                                </div>


                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>City</label>

                                        <input type="text" class="form-control" name="city" required value="{{Auth::user()->city}}">
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Zip</label>

                                        <input type="text" class="form-control" name="zip" required value="{{Auth::user()->zip}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Street</label>

                                        <input type="text" class="form-control" name="street" value="{{Auth::user()->street}}">
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div  class="form-group">
                                        <label>Interest</label>

                                        <select class="form-control" name="interest" required>
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

    </div>
    <script type="text/javascript">
        populateCountries("country", "state");

    </script>
    <script type="text/javascript">
        $('#country').val('{{Auth::user()->country}}')
    </script>
    <script type="text/javascript">
        populateStates("country", "state");

    </script>
    <script type="text/javascript">
        $('#state').val('{{Auth::user()->state}}')
    </script>



@endsection

