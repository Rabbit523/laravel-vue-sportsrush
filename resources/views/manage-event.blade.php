@extends('layout')

@section('content')

    <div class="container py-3">
        <div class="row">

             <div class="col-md-12">
                 {{\App\Http\Controllers\PagesHandler::notification()}}

                 <h4 class="font-weight-bold mb-2">
                     <strong>Manage Event ({{$event->name}})</strong>
                 </h4>


             </div>

            <div class="col-md-12 py-3">

                <p class="font-weight-bold">
                    <strong>Search Teams / Users to invite</strong>
                </p>

                <form>

                    <div class="row">
                        <div class="col-md-3">

                            <div class="form-group">

                                <select required class="form-control" name="search_type">                <option value="">Select Search Type</option>
                                    <option value="team">Team</option>
                                    <option value="user">Individual</option>
                                </select>

                            </div>

                        </div>
                        <div class="col-md-6">

                             <div class="form-group">

                                 <input type="text"  class="form-control " name="search" value="{{app('request')->get('search')}}" placeholder="Search by name ...">

                             </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <input type="hidden" name="event_id" value="{{$event->id}}">

                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fa fa-search"></i> &nbsp;Search
                                </button>

                            </div>

                        </div>


                    </div>

                </form>

            </div>
            @if(!empty($search_team))
                <div class="col-md-12 py-2">
                    <p class="font-weight-bold">
                        <strong>Search results and suggestions for team</strong>
                    </p>

                </div>

                <div class="col-md-12">
                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>Team Name</th>
                                <th>Team Type</th>
                                <th>Accessibility</th>
                                <th>Creator</th>
                                <th>View more</th>
                                <th>Invite</th>
                            </tr>
                            </thead>
                            <tbody>

                               @foreach($search_team as $value)

                                   <tr>

                                       <td>{{$value->name}}</td>
                                       <td>{{$value->type}}</td>
                                       <td>{{$value->access_type}}</td>
                                       <td>{{$value->creator->first_name}} {{$value->creator->last_name}}</td>

                                       <td>
                                           <a target="_blank" href="{{route('team.details',['team_id' => $value->id])}}" class="btn btn-primary text-white">
                                              <i class="fa fa-book"></i>&nbsp;View more
                                           </a>
                                       </td>

                                       <td>
                                           <a href="{{route('event.invitation.send',['event_id' => $event->id , 'team_id' => $value->id ])}}"   class="btn btn-success text-white">
                                               <i class="fa fa-check"></i>&nbsp;                                   Invite
                                           </a>
                                       </td>



                                   </tr>

                               @endforeach

                            </tbody>

                        </table>


                    </div>
                    {{$search_team->links()}}
                </div>
            @endif

        @if(!empty($search_user))
                <div class="col-md-12 py-2">
                    <p class="font-weight-bold">
                        <strong>Search results and suggestions for users</strong>
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

                       @foreach($search_user as $val)

                           <tr>
                               <td>{{$val->id}}</td>
                               <td>{{$val->first_name}} {{$val->last_name}}</td>
                               <td>{{$val->email}}</td>

                               <td>{{$val->country}}</td>

                               <td>
                                   <a href="{{route('event.invitation.send',['event_id' => $event->id , 'member_id' => $val->id ])}}" class="btn btn-primary text-white">

                                       <i class="fa fa-check"></i>&nbsp;Invite

                                   </a>
                               </td>



                           </tr>

                       @endforeach


                       </tbody>

                   </table>


               </div>
                {{$search_user->links()}}
            </div>
            @endif



            <div class="col-md-12 py-4">
                <p class="font-weight-bold">
                    <strong>Invitations Sent to Teams</strong>
                </p>

            </div>
            @if(!empty($event->invitations))
                <div class="col-md-12">
                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>Team Name</th>
                                <th>Type</th>
                                <th>Accessibility</th>
                                <th>Creator</th>
                                <th>Invited at</th>
                                <th>Status</th>
                                <th>Cancel</th>

                            </tr>
                            </thead>
                            <tbody>

                               @foreach($event->invitations as $invitation)
                                        @if($invitation->team_id != null)
                                            <tr>

                                                <td>{{$invitation->team->name}}</td>
                                                <td>{{$invitation->team->type}}</td>

                                        <td>{{$invitation->team->access_type}}</td>

                                        <td>{{$invitation->team->creator->first_name}} {{$invitation->team->creator->last_name}}</td>
                                        <td>
                                            {{$invitation->created_at}}
                                        </td>
                                        <td>{{$invitation->status}}</td>
                                        <td>
                                            <a class="btn btn-danger text-white">
                                                <i class="fa fa-trash"></i> Cancel
                                            </a>
                                        </td>
                                    </tr>
                                  @endif
                               @endforeach

                            </tbody>

                        </table>


                    </div>
                </div>

            @endif


            <div class="col-md-12 py-4">
                <p class="font-weight-bold">
                    <strong>Invitations Sent to Individuals</strong>
                </p>

            </div>
            @if(!empty($event->invitations))
                <div class="col-md-12">
                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>User ID</th>

                                <th>User name</th>
                                <th>Email</th>
                                <th>County</th>
                                <th>Invited at</th>
                                <th>Status</th>
                                <th>Cancel</th>

                            </tr>
                            </thead>
                            <tbody>

                              @foreach($event->invitations as $invitation)
                                @if($invitation->member != null)
                                  <tr>
                                      <td>{{$invitation->member->id}}</td>
                                      <td>{{$invitation->member->first_name}}</td>
                                      <td>{{$invitation->member->email}}</td>
                                      <td>{{$invitation->member->country}}</td>
                                      <td>{{$invitation->created_at}}</td>
                                      <td>{{$invitation->status}}</td>
                                      <td>
                                          <a class="btn btn-danger text-white">
                                              <i class="fa fa-trash"></i> Cancel
                                          </a>
                                      </td>
                                  </tr>
                                 @endif
                              @endforeach


                            </tbody>

                        </table>


                    </div>
                </div>

            @endif


            <div class="col-md-12 py-4">
                <p class="font-weight-bold">
                    <strong>Teams Joined</strong>
                </p>

            </div>
            @if(!empty($event->members))
                <div class="col-md-12">
                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>Team Name</th>
                                <th>Creator</th>

                                <th>Type</th>
                                <th>Accessibility</th>

                                <th>Joined at</th>
                                <th>View more</th>

                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>


                               @foreach($event->members as $member)
                                  @if($member->team != null)
                                   <tr>

                                       <td>{{$member->team->name}}</td>

                                       <td>{{$member->team->creator->first_name}} {{$member->team->creator->last_name}}</td>


                                       <td>{{$member->team->type}}</td>

                                       <td>{{$member->team->access_type}}</td>

                                       <td>{{$member->created_at}}</td>

                                       <td>
                                           <a href="{{route('team.details',['team_id' => $member->team->id])}}" target="_blank" class="btn btn-primary">
                                               <i class="fa fa-book"></i> View
                                           </a>
                                       </td>

                                       <td>
                                           <a href="{{route('team.details',['team_id' => $member->team->id])}}"  class="btn btn-danger">
                                               <i class="fa fa-trash"></i> Delete
                                           </a>
                                       </td>
                                   </tr>
                                  @endif
                               @endforeach
                            </tbody>

                        </table>


                    </div>
                </div>

            @endif
        </div>

    </div>

@endsection
