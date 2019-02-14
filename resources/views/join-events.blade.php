@extends('layout')

@section('content')

    <div class="container py-3">
        <div class="row">

             <div class="col-md-12">
                 {{\App\Http\Controllers\PagesHandler::notification()}}

                 <h4 class="font-weight-bold mb-2">
                     <strong>Join Events</strong>
                 </h4>
               
                 <div class="table-responsive">

                     <table class="table table-hover">

                         <thead>
                         <tr>
                             <th class="font-weight-bold">Event Name</th>
                             <th class="font-weight-bold">Event Creator</th>
                             <th class="font-weight-bold">Type</th>
                             <th class="font-weight-bold">Accessibility</th>
                             <th class="font-weight-bold">Starting Date</th>
                             <th class="font-weight-bold">View Details</th>

                             <th class="font-weight-bold">Join</th>
                         </tr>
                         </thead>

                          <tbody>

                              @foreach($events as $event)

                                  <tr>

                                      <td>{{$event->name}}</td>

                                      <td>{{$event->creator->first_name}} {{$event->creator->last_name}}</td>

                                      <td>{{$event->type}}</td>

                                      <td>{{$event->access_type}}</td>

                                      <td>{{$event->starting_time}}</td>

                                      <td>
                                          <a href="{{route('event.details',['event_id' => $event->id])}}" class="btn btn-primary text-white" target="_blank">
                                              <i class="fa fa-book"></i> View more
                                          </a>
                                      </td>

                                      <td>
                                          @if($event->hasMembership == null)
                                          <a href="{{route('event.join',['event_id' => $event->id ])}}" class="btn btn-primary text-white" >
                                              <i class="fa fa-plus"></i> Join
                                          </a>
                                          @else

                                              <label class="badge badge-secondary badge-success">
                                                  Joined
                                              </label>

                                          @endif
                                      </td>




                                  </tr>

                              @endforeach

                          </tbody>

                     </table>
                     {{$events->links()}}
                 </div>


             </div>


        </div>

    </div>

@endsection
