@extends('layout')

@section('content')

    <div class="container py-3">
        <div class="row">

             <div class="col-md-12">
                 {{\App\Http\Controllers\PagesHandler::notification()}}

                 <h4 class="font-weight-bold mb-2">
                     <strong>Event Invitations</strong>
                 </h4>

                 <div class="table-responsive">

                     <table class="table table-hover">

                         <thead>
                         <tr>
                             <th class="font-weight-bold">Event Name</th>
                             <th class="font-weight-bold">Event Creator</th>
                             <th class="font-weight-bold">Event Type</th>
                             <th class="font-weight-bold">Accessibility</th>
                             <th class="font-weight-bold">Event Start Date</th>
                             <th class="font-weight-bold">Team Name</th>
                             <th class="font-weight-bold">View</th>

                             <th class="font-weight-bold">Accept</th>
                             <th class="font-weight-bold">Reject</th>
                         </tr>
                         </thead>

                         <tbody>

                              @foreach($team_invitations as $invitation)

                                 @foreach($invitation->invitationReceived as $val)

                                       <tr>
                                           <td>{{$val->event->name}}</td>
                                           <td>{{$val->event->creator->first_name}} {{$val->event->creator->last_name}}</td>

                                           <td>{{$val->event->type}}</td>

                                           <td>{{$val->event->access_type}}</td>

                                           <td>{{$val->event->starting_time}}</td>

                                           <td>{{$val->team->name}}</td>

                                           <td>
                                               <a class="btn btn-primary" href="{{route('event.details',['event_id'=> $val->event->id])}}" target="_blank">
                                                  <i class="fa fa-book"></i> View
                                               </a>
                                           </td>
                                           <td>
                                              <a href="{{route('event.invitation.accept',['event_id' => $val->event->id , 'team_id' => $val->team_id , 'member_id' => $val->member_id , 'invitation_id' => $val->id ])}}" class="btn btn-success">
                                                  <i class="fa fa-check"></i>                                               </a>
                                           </td>
                                           <td>
                                               <a href="" class="btn btn-danger">
                                                   <i class="fa fa-trash"></i>
                                               </a>
                                           </td>

                                       </tr>
                                 @endforeach

                               @endforeach
                         </tbody>


                     </table>
                 </div>

                  {{$team_invitations->links()}}
             </div>


        </div>

    </div>

@endsection
