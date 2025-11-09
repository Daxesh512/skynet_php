@extends('admin.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Backup') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('Backup') }}</li>
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
                            <h3 class="card-title mt-1">{{ __('Backup Lists') }}</h3>
                            <div class="card-tools d-flex">
                                <form  action="{{route('admin.backup.store')}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Create Backup</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (count($backups) == 0)
                                <h3 class="text-center">{{ __('NO BACKUP FOUND') }}</h3>
                            @else
                            <table  class="table table-striped table-bordered data_table">
                                <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Data & Time') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($backups as $key => $backup)
                                    <tr>
                                        <td>{{$backup->created_at}}</td>
                                        <td>
                                            <form class="d-inline-block" action="{{route('admin.backup.download', $backup->id)}}" method="post">
                                                @csrf
                                                <input type="hidden" name="filename" value="{{$backup->filename}}">
                                                <button type="submit" class="btn btn-secondary btn-sm">
                                <span class="btn-label">
                                  <i class="fas fa-arrow-alt-circle-down"></i>
                                </span>
                                                    Download
                                                </button>
                                            </form>
                                            <form class="deleteform d-inline-block" action="{{route('admin.backup.delete', $backup->id)}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm deletebtn">
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
                             @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
