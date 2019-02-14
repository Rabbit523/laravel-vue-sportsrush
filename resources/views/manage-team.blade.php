@extends('layout')

@section('content')

    <div class="container py-3">
        <div class="row">

             <div class="col-md-12">
                 {{\App\Http\Controllers\PagesHandler::notification()}}

                 <h4 class="font-weight-bold mb-2">
                     <strong>Manage Team ({{$team->name}})</strong>
                 </h4>


             </div>

            <div class="col-md-12 py-3">

                <p class="font-weight-bold">
                    <strong>Search User to invite</strong>
                </p>

                <form>

                    <div class="row">

                        <div class="col-md-9">

                             <div class="form-group">

                                 <input type="text"  class="form-control " name="search" value="{{app('request')->get('search')}}" placeholder="Search by name or email ...">

                             </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <input type="hidden" name="team_id" value="{{$team->id}}">

                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fa fa-search"></i> &nbsp;Search User
                                </button>

                            </div>

                        </div>


                    </div>

                </form>

            </div>
            @if(!empty($search))
                <div class="col-md-12 py-2">
                    <p class="font-weight-bold">
                        <strong>Search results and suggestions </strong>
                    </p>

                </div>

                <div class="col-md-12">
               <div class="table-responsive">

                   <table class="table table-hover">

                       <thead>
                       <tr>
                           <th>User ID</th>
                           <th>Username</th>
                           <th>Email</th>
                           <th>Country</th>
                           <th>Invite</th>
                       </tr>
                       </thead>
                       <tbody>

                       @foreach($search as $val)

                           <tr>
                               <td>{{$val->id}}</td>
                               <td>{{$val->first_name}} {{$val->last_name}}</td>
                               <td>{{$val->email}}</td>

                               <td>{{$val->country}}</td>

                               <td>
                                   <a href="{{route('team.invitation.send',['team_id' => $team->id , 'receiver_id' => $val->id ])}}" class="btn btn-primary text-white">

                                       <i class="fa fa-check"></i>&nbsp;Invite

                                   </a>
                               </td>



                           </tr>

                       @endforeach


                       </tbody>

                   </table>


               </div>
                {{$search->links()}}
            </div>
            @endif

            <div class="col-md-12 py-4">
                <p class="font-weight-bold">
                    <strong>Invitations Sent</strong>
                </p>

            </div>
            @if(!empty($team->invitationSent))
                <div class="col-md-12">
                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Username</th>
                                <th>Email</th>

                                <th>Invited at</th>
                                <th>Status</th>
                                <th>Cancel</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($team->invitationSent as $val)

                                <tr>
                                    <td>{{$val->receiver->id}}</td>
                                    <td>{{$val->receiver->first_name}} {{$val->last_name}}</td>
                                    <td>{{$val->receiver->email}}</td>
                                    <td>{{$val->created_at}}</td>
                                    <td>{{$val->status}}</td>

                                    <td>
                                        <a href="{{route('team.invitation.delete',['invitation_id' => $val->id ])}}" class="btn btn-danger text-white">

                                            <i class="fa fa-trash"></i>&nbsp;Cancel

                                        </a>
                                    </td>



                                </tr>

                            @endforeach


                            </tbody>

                        </table>


                    </div>
                </div>

            @endif

            <div class="col-md-12 py-4">
                <p class="font-weight-bold">
                    <strong>Invitations Received by you</strong>
                </p>

            </div>
            @if(!empty($team->invitationReceived))
                <div class="col-md-12">
                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>Event Name</th>
                                <th>Creator</th>
                                <th>Type</th>
                                <th>Invited at</th>
                                <th>Details</th>

                                <th>Accept</th>
                                <th>Reject</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($team->invitationReceived as $val)

                                <tr>
                                    <td>{{$val->id}}</td>
                                    <td>{{$val->first_name}} {{$val->last_name}}</td>
                                    <td>{{$val->email}}</td>

                                    <td>{{$val->country}}</td>

                                    <td>
                                        <a class="btn btn-primary">

                                            <i class="fa fa-check"></i>&nbsp;Invite

                                        </a>
                                    </td>



                                </tr>

                            @endforeach


                            </tbody>

                        </table>


                    </div>
                </div>

            @endif


            <div class="col-md-12 py-4">
                <p class="font-weight-bold">
                    <strong>Members Added</strong>
                </p>

            </div>
            @if(!empty($team->members))
                <div class="col-md-12">
                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Username</th>
                                <th>Email</th>

                                <th>Joined at</th>
                                <th>View more</th>

                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($team->members as $val)

                                <tr>
                                    <td>{{$val->id}}</td>
                                    <td>{{$val->member->first_name}} {{$val->member->last_name}}</td>
                                    <td>{{$val->member->email}}</td>

                                    <td>{{$val->created_at}}</td>

                                    <td>
                                        <a class="btn btn-primary text-white">

                                            <i class="fa fa-book"></i>&nbsp;View

                                        </a>
                                    </td>

                                    <td>
                                        <a href="{{route('team.member.delete',['member_id' => $val->id ])}}" class="btn btn-danger text-white">

                                            <i class="fa fa-trash"></i>&nbsp;Delete

                                        </a>
                                    </td>




                                </tr>

                            @endforeach


                            </tbody>

                        </table>


                    </div>
                </div>

            @endif
        </div>

    </div>

@endsection
