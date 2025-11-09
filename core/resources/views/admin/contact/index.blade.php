@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Contact Page') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Contact Page') }}</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1">{{ __('Contact Info') }}</h3>
                                <div class="card-tools">
                                    <div class="d-inline-block mr-4">
                                        <select class="form-control form-control-sm lang" id="languageSelect" data="{{url()->current() . '?language='}}">
                                            @foreach($langs as $lang)
                                                <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}} >{{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('admin.contact_page_update', $contact_setting->language_id) }}" method="POST" >
                                    @csrf
                                   

                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Phone Number') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  data-role="tagsinput" name="number" placeholder="{{ __('Phone Number') }}" value="{{ $contact_setting->number }}">
                                            <p class="help-block text-info">{{ __('The first entered number will show in the header top menu & Service Page.') }}
                                            @if ($errors->has('number'))
                                                <p class="text-danger"> {{ $errors->first('number') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('Email Address') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  data-role="tagsinput" name="email" placeholder="{{ __('Email Address') }}" value="{{ $contact_setting->email }}">
                                            <p class="help-block text-info">{{ __('The first entered email will show in the header top menu.') }}
                                            @if ($errors->has('email'))
                                                <p class="text-danger"> {{ $errors->first('email') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('WhatsApp Number') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="whatsapp" placeholder="{{ __('WhatsApp Number') }}" value="{{ $contact_setting->whatsapp }}">
                                            @if ($errors->has('whatsapp'))
                                                <p class="text-danger"> {{ $errors->first('whatsapp') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('Office Location') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="address" placeholder="{{ __('Office Location') }}" value="{{ $contact_setting->address }}">
                                            @if ($errors->has('address'))
                                                <p class="text-danger"> {{ $errors->first('address') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('Opening Hours') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="opening_hours" placeholder="{{ __('Opening Hours') }}" value="{{ $contact_setting->opening_hours }}">
                                            @if ($errors->has('opening_hours'))
                                                <p class="text-danger"> {{ $errors->first('opening_hours') }} </p>
                                            @endif
                                        </div>
                                    </div>
        
                            
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                        </div>
                                    </div>
                                
                                </form>
                                
                            </div>
                            <!-- /.card-body -->
                        </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection
