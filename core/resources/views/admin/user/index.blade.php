@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('User Role') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('User Role') }}</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
   
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('User List') }}</h3>
                        <div class="card-tools d-flex">
                            <a href="{{ route('admin.user.add') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> {{ __('Add User & Role') }}
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Picture</th>
                              <th scope="col">Name</th>
                              <th scope="col">Username</th>
                              <th scope="col">Email</th>
                              <th scope="col">Role</th>
                              <th scope="col">Status</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($users as $key => $user)
                              @if ($user->id != Auth::guard('admin')->user()->id)
                                <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>
                                    <img class="w-80" src="{{asset('assets/admin/img/admin-user/'.$user->image)}}" alt="" >
                                  </td>
                                  <td>{{$user->name}}</td>
                                  <td>{{$user->username}}</td>
                                  <td>{{$user->email}}</td>
                                  <td>

                                    @if (empty($user->role))
                                      <span class="badge badge-danger">Owner</span>
                                    @else
                                      {{$user->role->name}}
                                    @endif
                                  </td>
                                  <td>
                                    @if ($user->status == 1)
                                      <span class="badge badge-success">Active</span>
                                    @elseif ($user->status == 0)
                                      <span class="badge badge-warning">Deactive</span>
                                    @endif
                                  </td>
                                  <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.user.edit', $user->id)}}">
                                      <span class="btn-label">
                                        <i class="fas fa-edit"></i>
                                      </span>
                                      Edit
                                    </a>
                                    <form id="deleteform" class="deleteform d-inline-block" action="{{ route('admin.user.delete', $user->id) }}" method="post">
                                      @csrf
                                      <button type="submit" class="btn btn-danger btn-sm deletebtn" id="delete">
                                        <span class="btn-label">
                                          <i class="fas fa-trash"></i>
                                        </span>
                                        Delete
                                      </button>
                                    </form>
                                  </td>
                                </tr>
                              @endif
                            @endforeach
                          </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
@endsection
