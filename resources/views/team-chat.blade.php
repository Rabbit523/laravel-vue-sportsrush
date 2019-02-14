@extends('layout')

@section('content')
    <?php $user_id = Auth::user()->getAuthIdentifier();?>
    <div class="container py-5">
        <div class="row">

            <div class="col-md-12">                

                <div class="row">

                    <div class="col-md-5">
                        
                        @foreach($teams_members as $val)
                        
                            @foreach($teams as $team)
                                @foreach($users as $user)
                                    @if($val->member_id == $user_id)
                                        @if($val->team_id == $team->id)
                                        <h3>{{$team->name}}</h3>
                                        <p>{{$user->first_name}}{{$user->last_name}}</p>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                            
                        @endforeach
                    
                    </div>
                    <div class="col-md-7">

                       
                    </div>

                </div>                

            </div>

        </div>

    </div>


@endsection
