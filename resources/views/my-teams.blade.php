@extends('layout')

@section('content')

    <div class="container py-3">
        <div class="row">

             <div class="col-md-12">
                 {{\App\Http\Controllers\PagesHandler::notification()}}

                 <h2 class="font-weight-bold mb-2">
                     <strong>My Teams</strong>
                 </h2>

                 <div class="table-responsive">

                     <table class="table table-hover">

                         <thead>
                         <tr>
                             <th class="font-weight-bold">Team No</th>
                             <th class="font-weight-bold">Team Name</th>
                             <th class="font-weight-bold">Type</th>
                             <th class="font-weight-bold">Accessibility</th>
                             <th class="font-weight-bold">Created at</th>
                             <th class="font-weight-bold">Updated at</th>
                             <th class="font-weight-bold">Edit</th>

                             <th class="font-weight-bold">Manage</th>
                             <th class="font-weight-bold">Delete</th>
                         </tr>
                         </thead>

                         <tbody>

                         @foreach($teams as $team)

                             <tr>
                                 <td>{{$team->id}}</td>
                                 <td>{{$team->name}}</td>
                                 <td>{{$team->type}}</td>
                                 <td>{{$team->access_type}}</td>
                                 <td>{{$team->created_at}}</td>
                                 <td>{{$team->updated_at}}</td>

                                 <td>
                                     <a href="{{route('team.details',['team_id' => $team->id ])}}" class="btn btn-primary text-white">
                                         <i class="fa fa-edit"></i>
                                     </a>
                                 </td>

                                 <td>
                                     <a href="{{route('team.manage',['team_id' => $team->id])}}" target="_blank" class="btn btn-success text-white">
                                         <i class="fa fa-cog"></i>
                                     </a>
                                 </td>

                                 <td>
                                     <a class="btn btn-danger text-white">
                                         <i class="fa fa-trash"></i>
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
