@extends('admin.layout')

@section('content')

      <div class="row">

          <div class="col-md-12">
              <h4 class="font-weight-bold">
                  <strong>Manage Teams</strong>
              </h4>
          </div>

          <div class="col-md-12 py-5">

              <div class="table-responsive">


                  <table class="table table-bordered">

                      <thead>
                      <tr>
                          <th>Team ID</th>
                          <th>Name</th>
                          <th>Type</th>
                          <th>Accessibility</th>
                          <th>Creator</th>

                          <th>Created at</th>

                          <th>Edit</th>
                          <th>Manage</th>
                          <th>Delete</th>
                      </tr>
                      </thead>
                      <tbody>

                      @foreach($teams as $event)

                          <tr>

                              <td>{{$event->id}}</td>

                              <td>{{$event->name}}</td>

                              <td>{{$event->type}}</td>

                              <td>{{$event->access_type}}</td>

                              <td>{{$event->creator->first_name}}</td>


                              <td>{{$event->created_at}}</td>


                              <td>
                                  <a class="btn btn-primary">
                                      <i class="fa fa-edit"></i>
                                  </a>
                              </td>

                              <td>
                                  <a class="btn btn-success">
                                      <i class="fa fa-cog"></i>
                                  </a>
                              </td>

                              <td>
                                  <a class="btn btn-danger">
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

@endsection
