@extends('layout')

@section('content')
    <?php
    $cms = \App\CMS::find(1) ;
    ?>
    <div class="container py-5">
        <div class="row">

            <div class="offset-md-1 col-md-10">

                <h2 class=" font-weight-bold"><strong>About Us</strong></h2>
                <h3 class="  font-weight-bold"><strong>We are awesome TEAM</strong></h3>


                {!! html_entity_decode($cms->about_us) !!}
                <h3 class=" mb-2 font-weight-bold"><strong>Our Team</strong></h3>

                <div class="row">

                    <div class="col-md-3">
                         <img src="https://dev.sportsrush.ch/static/img/team1.efd1ae1.png" class="img-fluid">
                         <br/>
                        <p class="font-weight-bold">Johne Doe</p>
                        <p class="font-weight-bold">Creative</p>

                    </div>
                    <div class="col-md-3">
                        <img src="https://dev.sportsrush.ch/static/img/team2.f3d8bf4.png" class="img-fluid">
                        <br/>
                        <p class="font-weight-bold">Johne Doe</p>
                        <p class="font-weight-bold">Creative</p>

                    </div>
                    <div class="col-md-3">
                        <img src="https://dev.sportsrush.ch/static/img/team4.eb4acb3.png" class="img-fluid">
                        <br/>
                        <p class="font-weight-bold">Johne Doe</p>
                        <p class="font-weight-bold">Creative</p>

                    </div>
                    <div class="col-md-3">
                        <img src="https://dev.sportsrush.ch/static/img/team3.470c934.png" class="img-fluid">
                        <br/>
                        <p class="font-weight-bold">Johne Doe</p>
                        <p class="font-weight-bold">Creative</p>

                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection
