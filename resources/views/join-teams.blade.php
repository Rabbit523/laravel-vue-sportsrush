@extends('layout')

@section('content')

    <div class="container py-3">
        <div class="row">

             <div class="col-md-12">
                 {{\App\Http\Controllers\PagesHandler::notification()}}

                 <h4 class="font-weight-bold mb-2">
                     <strong>Join Teams</strong>
                 </h4>

                 <div class="table-responsive">

                     <table class="table table-hover">

                         <thead>
                         <tr>
                             <th class="font-weight-bold">Team No</th>
                             <th class="font-weight-bold">Team Name</th>
                             <th class="font-weight-bold">Team Creator</th>
                             <th class="font-weight-bold">Type</th>
                             <th class="font-weight-bold">Accessibility</th>
                             <th class="font-weight-bold">Updated at</th>
                             <th class="font-weight-bold">View Details</th>

                             <th class="font-weight-bold">Join</th>
                         </tr>
                         </thead>

                         <tbody>

                         @foreach($teams as $team)

                             <tr>
                                 <td>{{$team->id}}</td>
                                 <td>{{$team->name}}</td>
                                 <td>{{$team->creator->first_name}}</td>
                                 <td>{{$team->type}}</td>
                                 <td>{{$team->access_type}}</td>
                                 <td>{{$team->updated_at}}</td>
                                 <td>
                                     <a href="{{route('team.details',['team_id' => $team->id ])}}" class="btn btn-primary text-white">
                                         <i class="fa fa-book"></i> Details
                                     </a>
                                 </td>

                                 <td>
                                     <a href="{{route('team.join',['team_id' => $team->id ])}}" class="btn btn-primary text-white">
                                         <i class="fa fa-plus"></i> Join
                                     </a>
                                 </td>










                             </tr>

                         @endforeach

                         </tbody>


                     </table>
                     {{$teams->links()}}
                 </div>


             </div>


        </div>

    </div>

@endsection
