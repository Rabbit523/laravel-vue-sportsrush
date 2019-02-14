@extends('layout')

@section('content')

        <?php
          $slides = \App\Slide::orderBy('id','asc')->get() ;
        ?>
        <div class="container-fluid" style="margin: 0 !important;padding: 0 !important;">
            <div class="row align-items-center" style="margin: 0 !important;padding: 0 !important;">



                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($slides as $key => $slide)
                            <li @if($key == 0) class="active" @endif data-target="#carouselExampleIndicators" data-slide-to="{{$key}}"  ></li>

                                @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($slides as $key => $slide)
                            <div class="carousel-item @if($key == 0) active @endif justify-content-center">
                                <img class="d-block w-100" src="{{$slide->img_url}}" alt="slide">

                                <div class="carousel-caption justify-content-center">
                                    <div class="col-12 col-md-12 col-lg-12">

                                        <center>

                                            <a data-toggle="modal" data-target="#login" href="" class="btn btn-success btn-lg">Login</a> &nbsp;&nbsp;   <a href="" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#registration">Register</a>

                                        </center>

                                    </div>
                                </div>

                            </div>

                                @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                <!--end of col-->
                <!--end of col-->
            </div>
            <!--end of row-->
            <div class="modal fade" tabindex="-1" role="dialog" id="registration">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{route('site.register')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="modal-header">
                            <h5 class="modal-title text-primary" >Register</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">

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

                                                     <div id="date" class="input-group date" data-date-format="mm-dd-yyyy">
                                                         <input class="form-control" name="date_birth" type="text" readonly />
                                                         <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                     </div>

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

                                                     <select id="country" class="form-control" name="country" required value="{{old('country')}}"></select>
                                                 </div>
                                             </div>

                                             <div class="col-md-6">

                                                 <div class="form-group">
                                                     <label>State</label>

                                                     <select id="state" class="form-control" name="state" value="{{old('state')}}">  </select>
                                                 </div>
                                             </div>


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


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Register</button>

                        </div>
                        </form>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="modal fade" tabindex="-1" role="dialog" id="login">

                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-primary" >Login</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">

                            <div class="row">

                                <div class="col-md-12">

                                    @if(session()->get('login_error') != null )

                                        <script type="text/javascript">

                                            $('#login').modal('show') ;
                                        </script>

                                    @endif
                                    <form action="{{route('site.login')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="row">
                                            @if(session()->get('login_error'))
                                                <div class="col-md-12">

                                                    <div class="alert alert-danger">{{session()->pull('login_error')}}</div>


                                                </div>
                                            @endif
                                            <div class="col-md-12">

                                                <div class="form-group">
                                                    <label>Email</label>

                                                    <input type="email" class="form-control" required name="email">
                                                </div>
                                            </div>




                                        </div>

                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="form-group">
                                                    <label>Password</label>

                                                    <input type="password" class="form-control" required name="password">
                                                </div>
                                            </div>




                                        </div>


                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <button type="submit" class="btn btn-primary btn-block">Login</button>


                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <a href="{{route('login.social',['method' => 'facebook'])}}" class="btn btn-primary btn-block" ><i class="fa fa-facebook"></i> &nbsp;Login with Facebook </a>


                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <a href="{{route('login.social',['method' => 'google'])}}" class="btn btn-danger btn-block" ><i class="fa fa-google-plus"></i> &nbsp;Login with Google </a>


                                                </div>

                                            </div>

                                        </div>




                                    </form>

                                </div>

                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


        </div>


        <!--end of container-->

    @if($errors->has('email') || $errors->has('password'))

        <script type="text/javascript">

            $('#registration').modal('show') ;
        </script>

    @endif
        <script type="text/javascript">
            populateCountries("country", "state");

        </script>
        <script type="text/javascript">
            $('#country').val('{{old('country')}}')
        </script>
        <script type="text/javascript">
            $('#state').val('{{old('state')}}')
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript">
            $(function () {

                $("#date").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
            });


        </script>
@endsection
