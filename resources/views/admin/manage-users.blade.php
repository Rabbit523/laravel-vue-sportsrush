@extends('admin.layout')

@section('content')

      <div class="row">

          <div class="col-md-12">
              <h4 class="font-weight-bold">
                  <strong>Manage Users</strong>
              </h4>
          </div>

          <div class="col-md-12 py-5">

              <div class="table-responsive">


                  <table class="table table-bordered">

                      <thead>
                      <tr>
                          <th>User ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Country</th>
                          <th>Joined at</th>

                          <th>Edit</th>
                          <th>Manage</th>
                          <th>Delete</th>
                      </tr>
                      </thead>
                      <tbody>

                      @foreach($users as $user)

                          <tr>

                              <td>{{$user->id}}</td>

                              <td>{{$user->first_name}} {{$user->last_name}}</td>

                              <td>{{$user->email}}</td>

                              <td>{{$user->country}}</td>

                              <td>{{$user->created_at}}</td>


                              <td>
                                  <a href="{{route('admin.user.profile',['user_id' => $user->id])}}" target="_blank" class="btn btn-primary">
                                      <i class="fa fa-edit"></i>
                                  </a>
                              </td>

                              <td>
                                  <a href="{{route('admin.user.profile',['user_id' => $user->id])}}" target="_blank" class="btn btn-success">
                                      <i class="fa fa-cog"></i>
                                  </a>
                              </td>

                              <td>
                                  <a href="{{route('admin.user.delete',['user_id' => $user->id ])}}" class="btn btn-danger">
                                      <i class="fa fa-trash"></i>
                                  </a>
                              </td>


                          </tr>

                      @endforeach

                      </tbody>

                  </table>
                   {{$users->links()}}
              </div>

          </div>

      </div>

@endsection
