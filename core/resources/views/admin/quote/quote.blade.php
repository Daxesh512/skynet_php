@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Quote') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Quote') }}</li>
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
                        <h3 class="card-title">{{ __('Quote List:') }}</h3>
                        <div class="card-tools d-flex">
                            <form class="d-inline-block mr-3" action="{{route('back.bulk.delete')}}" method="get">
                                <input type="hidden" value="" name="ids[]" id="bulk_delete">
                                <input type="hidden" value="quote" name="table">
                                <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> {{__('Bulk Delete')}}</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="idtable" class="table table-bordered table-striped data_table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" data-target="quote-bulk-delete" class="bulk_all_delete"></th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Subject') }}</th>
                                <th>{{ __('Mail') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach ($quotes as $id=>$quote)
                            <tr id="quote-bulk-delete">
                                <td><input type="checkbox" class="bulk-item" value="{{ $quote->id}} "></td>
                                <td>
                                    {{ $quote->name }}
                                </td>
                                <td>
                                    {{ $quote->subject }}
                                </td> 
                                <td>
                                    <a href="mailto:{{ $quote->email }}" class="btn btn-primary btn-sm"><i class="fas fa-paper-plane"></i> {{ __('Send Mail') }}</a>
                                </td> 
                                <td>
                                    <form id="statusForm{{$quote->id}}" class="d-inline-block" action="{{route('admin.quote.status')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="quote_id" value="{{$quote->id}}">
                                        <select class="form-control form-control-sm
                                        @if ($quote->status == 0)
                                        bg-warning
                                        @elseif ($quote->status == 1)
                                        bg-primary
                                        @elseif ($quote->status == 2)
                                        bg-success
                                        @elseif ($quote->status == 3)
                                        bg-danger
                                        @endif
                                        " name="status" onchange="document.getElementById('statusForm{{$quote->id}}').submit();">
                                        <option value="0" {{$quote->status == 0 ? 'selected' : ''}}>{{ __('Pending') }}</option>
                                        <option value="1" {{$quote->status == 1 ? 'selected' : ''}}>{{ __('Processing') }}</option>
                                        <option value="2" {{$quote->status == 2 ? 'selected' : ''}}>{{ __('Completed') }}</option>
                                        <option value="3" {{$quote->status == 3 ? 'selected' : ''}}>{{ __('Rejected') }}</option>
                                        </select>
                                    </form>  
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.quote.details', $quote->id) }}" ><i class="fas fa-eye"></i>{{ __('Details') }}</a>
                                    <form  id="deleteform" class="d-inline-block" action="{{ route('admin.quote.delete', $quote->id ) }}" method="post">
                                        @csrf
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

