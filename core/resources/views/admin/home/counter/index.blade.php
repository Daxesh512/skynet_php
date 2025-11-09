@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Counter') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Counter') }}</li>
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
                    <h3 class="card-title mt-1">{{ __('Counter List') }}</h3>
                    <div class="card-tools d-flex">
                        <div class="d-inline-block mr-4">
                            <select class="form-control lang" id="languageSelect" data="{{url()->current() . '?language='}}">
                                @foreach($langs as $lang)
                                    <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}} >{{$lang->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="{{ route('admin.counter.add'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> {{ __('Add') }}
                        </a>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Icon') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Value') }}</th>
                                <th>{{ __('Order') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                                </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($counters as $id=>$counter)
                        <tr>
                            <td>{{ ++$id }}</td>
                            <td>
                                <i class="{{ $counter->icon }}"></i>
                            </td>
                            <td>{{ $counter->title }}</td>
                            <td>{{ $counter->number }}</td>
                            <td>{{ $counter->serial_number }}</td>
                            <td>
                                @if($counter->status == 1)
                                    <span class="badge badge-success">{{ __('Publish') }}</span>
                                @else
                                    <span class="badge badge-warning">{{ __('Unpublish') }}</span>
                                @endif

                            </td>
                            <td>
                                <a href="{{ route('admin.counter.edit', $counter->id )  }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>

                                <form  id="deleteform" class="d-inline-block" action="{{ route('admin.counter.delete', $counter->id ) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                    <i class="fas fa-trash"></i>{{ __('Delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection
