@extends('layout')

@section('content')
    <?php
    $cms = \App\CMS::find(1) ;
    ?>
    <div class="container py-5">
        <div class="row">

            <div class="offset-md-1 col-md-10">

                <h2 class=" font-weight-bold"><strong>Who are we</strong></h2>



                {!! html_entity_decode($cms->who_are_we) !!}


            </div>

        </div>

    </div>

@endsection
