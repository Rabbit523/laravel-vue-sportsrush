@extends('layout')

@section('content')

    <div class="container py-3">
        <div class="row">

             <div class="col-md-12">
                 {{\App\Http\Controllers\PagesHandler::notification()}}

                 <h2 class="font-weight-bold mb-2">
                     <strong>My Events</strong>
                 </h2>

                 <div class="table-responsive">

                     <table class="table table-hover">

                         <thead>
                         <tr>
                             <th class="font-weight-bold">Event Name</th>
                             <th class="font-weight-bold">Type</th>
                             <th class="font-weight-bold">Accessibility</th>
                             <th class="font-weight-bold">Created at</th>
                             <th class="font-weight-bold">Updated at</th>
                             <th class="font-weight-bold">View</th>
                             <th class="font-weight-bold">Edit</th>

                             <th class="font-weight-bold">Manage</th>
                             <th class="font-weight-bold">Delete</th>
                         </tr>
                         </thead>

                         <tbody>

                         @foreach($events as $event)

                             <tr>
                                 <td>{{$event->name}}</td>
                                 <td>{{$event->type}}</td>
                                 <td>{{$event->access_type}}</td>
                                 <td>{{$event->created_at}}</td>
                                 <td>{{$event->updated_at}}</td>

                                 <td>
                                     <a href="{{route('event.details',['event_id' => $event->id])}}" class="btn btn-primary text-white">
                                         <i class="fa fa-book"></i>
                                     </a>
                                 </td>
                                 <td>
                                     <a href="{{route('event.edit',['event_id' => $event->id])}}" class="btn btn-primary text-white">
                                         <i class="fa fa-edit"></i>
                                     </a>
                                 </td>
                                 <td>
                                     <a href="{{route('event.manage',['event_id' => $event->id ])}}" class="btn btn-success text-white">
                                         <i class="fa fa-cog"></i>
                                     </a>
                                 </td>

                                 <td>
                                     <a href="{{route('event.delete',['event_id' => $event->id ])}}" class="btn btn-danger text-white">
                                         <i class="fa fa-trash"></i>
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
