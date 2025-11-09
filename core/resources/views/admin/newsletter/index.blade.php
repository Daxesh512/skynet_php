@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('newsletters') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('newsletters') }}</li>
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
                        <h3 class="card-title mt-1">{{ __('Email List') }}</h3>
                        <div class="card-tools d-flex">
                            <form class="d-inline-block mr-3" action="{{route('back.bulk.delete')}}" method="get">
                                <input type="hidden" value="" name="ids[]" id="bulk_delete">
                                <input type="hidden" value="newsletter" name="table">
                                <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> {{__('Bulk Delete')}}</button>
                            </form>
                            <a href="{{ route('admin.newsletter.add')}}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> {{ __('Add Email') }}
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" data-target="newsletter-bulk-delete" class="bulk_all_delete"></th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($newsletters as $id=>$newsletter)
                            <tr id="newsletter-bulk-delete">
                                <td>
                                    <input type="checkbox" class="bulk-item" value="{{ $newsletter->id}} ">
                                </td>
                                <td>
                                    {{ $newsletter->email }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.newsletter.edit', $newsletter->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>
                                    <form  id="deleteform" class="d-inline-block" action="{{ route('admin.newsletter.delete', $newsletter->id ) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $newsletter->id }}">
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
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
@endsection
