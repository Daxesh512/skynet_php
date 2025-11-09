@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('User') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('User') }}</li>
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
                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Picture</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Email Status</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                  <td>{{ ++$key}}</td>
                                  <td>
                                    <img class="w-80" src="{{asset('assets/front/img/'.$user->image)}}" alt="" >
                                  </td>
                                  <td>{{$user->name}}</td>
                                  <td>{{$user->email}}</td>
                                  <td>
                                    <form id="statusForm{{$user->id}}" class="d-inline-block" action="{{route('admin.front_user.status_update')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <select class="form-control form-control-sm
                                        @if ($user->email_verified == '0')
                                          bg-warning
                                        @elseif ($user->email_verified == 'Yes')
                                          bg-success
                                        @endif
                                        " name="email_status" onchange="document.getElementById('statusForm{{$user->id}}').submit();">
                                          <option value="0" {{$user->email_verified == '0' ? 'selected' : ''}}>Unverify</option>
                                          <option value="Yes" {{$user->email_verified == 'Yes' ? 'selected' : ''}}>Verify</option>
                                        </select>
                                      </form>
                                  </td>
                                
                                  <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.front_user.details', $user->id)}}">
                                      <span class="btn-label">
                                        <i class="fas fa-eye"></i>
                                      </span>
                                      View
                                    </a>
                                 
                                    <form id="deleteform" class="deleteform d-inline-block" action="{{route('admin.front_user.status_delete', $user->id)}}" method="post">
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
