@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Role') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Role') }}</li>
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
                        <h3 class="card-title mt-1">{{ __('Role List') }}</h3>
                        <div class="card-tools d-flex">
                            <a href="{{ route('admin.role.add'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> {{ __('Add') }}
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Permissions</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($roles as $key => $role)
                              <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                  <a class="btn btn-info btn-sm" href="{{route('admin.role.permissions.manage', $role->id)}}">
                                    <span class="btn-label">
                                      <i class="fas fa-edit"></i>
                                    </span>
                                    Manage
                                  </a>
                                </td>
                                <td>
                                  <a class="btn btn-primary btn-sm editbtn" href="{{ route('admin.role.edit', $role->id) }}">
                                    <span class="btn-label">
                                      <i class="fas fa-edit"></i>
                                    </span>
                                    Edit
                                  </a>
                                  <form id="deleteform" class="deleteform d-inline-block" action="{{route('admin.role.delete', $role->id)}}" method="post">
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
