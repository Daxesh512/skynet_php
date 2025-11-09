@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Blog Category') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Blogs') }}</li>
            <li class="breadcrumb-item">{{ __('Blog Category') }}</li>
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
                        <h3 class="card-title mt-1">{{ __('Blog Category List') }}</h3>
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
                                <input type="hidden" value="bcategory" name="table">
                                <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> {{__('Bulk Delete')}}</button>
                            </form>
                            <a href="{{ route('admin.bcategory.add'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> {{ __('Add') }}
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" data-target="bcategory-bulk-delete" class="bulk_all_delete"></th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Order') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($bcategories as $id=>$bcategory)
                            <tr id="bcategory-bulk-delete">
                                <td><input type="checkbox" class="bulk-item" value="{{ $bcategory->id}} "></td>
                                <td>
                                    {{ $bcategory->name }}
                                </td>
                                <td>
                                    {{ $bcategory->serial_number }}
                                </td>
                                <td>
                                    @if($bcategory->status == 1)
                                        <span class="badge badge-success">{{ __('Publish') }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ __('Unpublish') }}</span>
                                    @endif
                                    
                                </td>
                                <td>
                                    <a href="{{ route('admin.bcategory.edit', $bcategory->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>

                                    <form  id="deleteform" class="d-inline-block" action="{{ route('admin.bcategory.delete', $bcategory->id ) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $bcategory->id }}">
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
