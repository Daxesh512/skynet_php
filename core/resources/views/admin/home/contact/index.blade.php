@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Contact Section') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Contact Section') }}</li>
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
                                <h3 class="card-title mt-1">{{ __('Contact Section Info') }}</h3>
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
                                <form class="form-horizontal" action="{{ route('admin.contact_section_update', $static->language_id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                   
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Image') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <img class="mw-400 mb-3 img-demo show-img" src="{{ asset('assets/front/img/'.$static->contact_form_image) }}" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="contact_form_image">{{ __('Choose New Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="contact_form_image" id="contact_form_image">
                                            </div>
                                            <p class="help-block text-info">{{ __('Upload 530X730 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                            @if ($errors->has('contact_form_image'))
                                                <p class="text-danger"> {{ $errors->first('contact_form_image') }} </p>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Contact BG Image') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <img class="mw-400 mb-3 img-demo show-img" src="{{ asset('assets/front/img/'.$static->contact_section_bg_image) }}" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="contact_section_bg_image">{{ __('Choose New Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="contact_section_bg_image" id="contact_section_bg_image">
                                            </div>
                                            <p class="help-block text-info">{{ __('Upload 530X730 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                            @if ($errors->has('contact_section_bg_image'))
                                                <p class="text-danger"> {{ $errors->first('contact_section_bg_image') }} </p>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Title') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="contact_title" placeholder="{{ __('Title') }}" value="{{ $static->contact_title }}">
                                            @if ($errors->has('contact_title'))
                                                <p class="text-danger"> {{ $errors->first('contact_title') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('Subtitle') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="contact_sub_title" placeholder="{{ __('Subtitle') }}" value="{{ $static->contact_sub_title }}">
                                            @if ($errors->has('contact_sub_title'))
                                                <p class="text-danger"> {{ $errors->first('contact_sub_title') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Form Title') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="contact_form_title" placeholder="{{ __('Form Title') }}" value="{{ $static->contact_form_title }}">
                                            @if ($errors->has('contact_form_title'))
                                                <p class="text-danger"> {{ $errors->first('contact_form_title') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('Map Embed Link') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <textarea name="contact_map" class="form-control" rows="5" placeholder="{{ __('Map Embed Link') }}">{{ $static->contact_map }}</textarea>
                                            @if ($errors->has('contact_map'))
                                                <p class="text-danger"> {{ $errors->first('contact_map') }} </p>
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
