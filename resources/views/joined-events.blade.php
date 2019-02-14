@extends('layout')

@section('content')

    <div class="container py-3">
        <div class="row">

             <div class="col-md-12">
                 {{\App\Http\Controllers\PagesHandler::notification()}}

                 <h4 class="font-weight-bold mb-2">
                     <strong>Joined Events</strong>
                 </h4>
                 <p class="font-weight-bold">
                 </p>
                 <div class="table-responsive">

                     <table class="table table-hover">

                         <thead>
                         <tr>
                             <th class="font-weight-bold">Event Name</th>
                             <th class="font-weight-bold">Team Name</th>
                             <th class="font-weight-bold">Type</th>
                             <th class="font-weight-bold">Accessibility</th>
                             <th class="font-weight-bold">Starting Date</th>
                             <th class="font-weight-bold">View Details</th>

                             <th class="font-weight-bold">Unjoin</th>
                         </tr>
                         </thead>

                          <tbody>

                              @foreach($events as $event)

                                  <tr>

                                      <td>{{$event->event->name}}</td>
                                      @if($event->team != null)
                                      <td>{{$event->team->name}}</td>
                                      @else
                                          <td><span class="badge btn-primary">Individual</span> </td>
                                      @endif
                                     

                                      <td>{{$event->event->type}}</td>

                                      <td>{{$event->event->access_type}}</td>

                                      <td>{{$event->event->starting_time}}</td>

                                      <td>
                                          <a href="{{route('event.details',['event_id' => $event->id])}}" class="btn btn-primary text-white" target="_blank">
                                              <i class="fa fa-book"></i> View more
                                          </a>
                                      </td>

                                      <td>
                                          <a href="{{route('event.join',['event_id' => $event->id ])}}" class="btn btn-primary text-white" >
                                              <i class="fa fa-minus"></i> Unjoin
                                          </a>
                                        
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
