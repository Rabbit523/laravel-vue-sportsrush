@extends('layout')

@section('content')

    <div class="container py-3">
        <div class="row">

             <div class="col-md-12">
                 {{\App\Http\Controllers\PagesHandler::notification()}}

                 <h4 class="font-weight-bold mb-2">
                     <strong>Team Invitations</strong>
                 </h4>

                 <div class="table-responsive">

                     <table class="table table-hover">

                         <thead>
                         <tr>
                             <th class="font-weight-bold">Team Name</th>
                             <th class="font-weight-bold">Type</th>
                             <th class="font-weight-bold">Accessibility</th>
                             <th class="font-weight-bold">Invited at</th>
                             <th class="font-weight-bold">View</th>

                             <th class="font-weight-bold">Accept</th>
                             <th class="font-weight-bold">Reject</th>
                         </tr>
                         </thead>

                         <tbody>

                         @foreach($invitations as $invitation)

                             <tr>

                                 <td>
                                     {{$invitation->team->name}}

                                 </td>
                                 <td>
                                     {{$invitation->team->type}}

                                 </td>
                                 <td>
                                     {{$invitation->team->access_type}}

                                 </td>
                                 <td>
                                     {{$invitation->created_at}}

                                 </td>
                                 <td>

                                     <a href="{{route('team.details',['team_id' => $invitation->team_id])}}" class="btn btn-primary text-white">
                                         <i class="fa fa-book"></i> View
                                     </a>

                                 </td>

                                 <td>

                                     <a href="{{route('team.invitation.accept',['invitation_id' => $invitation->id ])}}" class="btn btn-success text-white">
                                         <i class="fa fa-check"></i> Accept
                                     </a>

                                 </td>

                                 <td>

                                     <a href="{{route('team.invitation.delete',['invitation_id' => $invitation->id ])}}" class="btn btn-danger text-white">
                                         <i class="fa fa-trash"></i> Reject
                                     </a>

                                 </td>



                             </tr>

                         @endforeach

                         </tbody>


                     </table>
                     {{$invitations->links()}}
                 </div>


             </div>


        </div>

    </div>

@endsection
