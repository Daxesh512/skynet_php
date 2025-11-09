@extends('admin.layout')

@section('content')

<style>
    .mw-60{
        width: 60%;
    }
</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Quote Details') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Quote Details') }}</li>
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
                    <h3 class="card-title">{{ __('Quote Details:') }}</h3>
                    <div class="card-tools">
                        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">
                          <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                        </a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>
                                    {{ __('Name') }}
                                </th>
                                <td class="mw-60">
                                    {{ $quote->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Email') }}
                                </th>
                                <td class="mw-60">
                                    {{ $quote->email }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Phone') }}
                                </th>
                                <td class="mw-60">
                                    <a href="tel:{{ $quote->phone }}" class="btn btn-primary btn-sm">  {{ __("Call to : ") }} {{ $quote->phone }}</a>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Country') }}
                                </th>
                                <td class="mw-60">
                                    {{ $quote->country }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Budget') }}
                                </th>
                                <td class="mw-60">
                                    {{ $quote->budget }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Skype ID') }}
                                </th>
                                <td class="mw-60">
                                    {{ $quote->skypenumber }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('File') }}
                                </th>
                                <td class="mw-60">
                                    @if($quote->file)
                                    <a href="{{asset('assets/front/quote/'.$quote->file)}}" class="btn btn-primary btn-sm inline-block">Download File</a>
                                    @else
                                    {{ __('No File Available') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Status') }}
                                </th>
                                <td class="mw-60">
                                    <span class="
                                    btn
                                    @if ($quote->status == 0)
                                    bg-warning
                                    @elseif ($quote->status == 1)
                                    bg-primary
                                    @elseif ($quote->status == 2)
                                    bg-success
                                    @elseif ($quote->status == 3)
                                    bg-danger
                                    @endif

                                    btn-sm
                                    "> 
                                        @if($quote->status == 0)
                                        Pending
                                        @elseif($quote->status == 1)
                                        Processing
                                        @elseif($quote->status == 2)
                                        Completed
                                        @elseif($quote->status == 3)
                                        Rejected
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Subject') }}
                                </th>
                                <td class="mw-60">
                                    {{ $quote->subject }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Description') }}
                                </th>
                                <td class="mw-60">
                                    {{ $quote->description }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Send Mail') }}
                                </th>
                                <td class="mw-60">
                                    <a href="mailto:{{ $quote->email }}" class="btn btn-primary btn-sm"><i class="fas fa-paper-plane"></i> {{ __('Send Mail') }}</a>
                                </td>
                            </tr>
                 
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

