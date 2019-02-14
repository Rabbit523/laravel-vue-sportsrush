@extends('layout')

@section('content')

    <div class="container-fluid py-5">
        <div class="row">

            <div class="offset-md-4 col-md-4">

                <h2 class=" font-weight-bold"><strong>Contact Us</strong></h2>

                <form class="font-weight-bold">

                    <div class="form-group">

                        <label>Name</label>
                        <input type="text" class="form-control" >
                    </div>

                    <div class="form-group">

                        <label>Email</label>
                        <input type="text" class="form-control" >
                    </div>

                    <div class="form-group">

                        <label>Subject</label>
                        <input type="text" class="form-control" >
                    </div>


                    <div class="form-group">

                        <label>Message</label>

                        <textarea class="form-control">
                            
                        </textarea>

                    </div>

                    <div class="form-group">


                        <button type="submit" class="btn btn-primary btn-block">Submit</button>

                    </div>

                </form>


            </div>

        </div>

    </div>

@endsection
