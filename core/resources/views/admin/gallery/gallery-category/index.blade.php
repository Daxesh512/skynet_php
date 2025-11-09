@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Gallery Category') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Gallery') }}</li>
            <li class="breadcrumb-item">{{ __('Gallery Category') }}</li>
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
                        <h3 class="card-title mt-1">{{ __('Gallery Category List') }}</h3>
                        <div class="card-tools d-flex">
                            <div class="d-inline-block mr-4">
                                <select class="form-control lang" id="languageSelect" data="{{url()->current() . '?language='}}">
                                    @foreach($langs as $lang)
                                        <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}} >{{$lang->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <form class="d-inline-block mr-3" action="{{route('back.bulk.delete')}}" method="get">
                                <input type="hidden" value="" name="ids[]" id="bulk_delete">
                                <input type="hidden" value="gcategory" name="table">
                                <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> {{__('Bulk Delete')}}</button>
                            </form>
                            <a href="{{ route('admin.gcategory.add'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> {{ __('Add') }}
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" data-target="gcategory-bulk-delete" class="bulk_all_delete"></th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Order') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($gcategories as $id=>$gcategory)
                            <tr id="gcategory-bulk-delete">
                                <td><input type="checkbox" class="bulk-item" value="{{ $gcategory->id}} "></td>
                                <td>
                                    {{ $gcategory->name }}
                                </td>
                                <td>
                                    {{ $gcategory->serial_number }}
                                </td>
                                <td>
                                    @if($gcategory->status == 1)
                                        <span class="badge badge-success">{{ __('Publish') }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ __('Unpublish') }}</span>
                                    @endif
                                    
                                </td>
                                <td>
                                    <a href="{{ route('admin.gcategory.edit', $gcategory->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>

                                    <form  id="deleteform" class="d-inline-block" action="{{ route('admin.gcategory.delete', $gcategory->id ) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $gcategory->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                        <i class="fas fa-trash"></i>{{ __('Delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection
