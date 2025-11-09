@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Intor Video') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Intor Video') }}</li>
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
                                <h3 class="card-title mt-1">{{ __('Intor Video Info') }}</h3>
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
                                <form class="form-horizontal" action="{{ route('admin.intro_video_update', $static->language_id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                   
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Image') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <img class="mw-400 mb-3 img-demo show-img" src="{{ asset('assets/front/img/'.$static->video_image) }}" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="video_image">{{ __('Choose New Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="video_image" id="video_image">
                                            </div>
                                            <p class="help-block text-info">{{ __('Upload 529X558 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                            @if ($errors->has('video_image'))
                                                <p class="text-danger"> {{ $errors->first('video_image') }} </p>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Section BG Image') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <img class="mw-400 mb-3 img-demo show-img" src="{{ asset('assets/front/img/'.$static->video_bg_image) }}" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="video_bg_image">{{ __('Choose New Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="video_bg_image" id="video_bg_image">
                                            </div>
                                            <p class="help-block text-info">{{ __('Upload 1920X900 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                            @if ($errors->has('video_bg_image'))
                                                <p class="text-danger"> {{ $errors->first('video_bg_image') }} </p>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Left Image') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <img class="mw-400 mb-3 img-demo show-img" src="{{ asset('assets/front/img/'.$static->video_image_left) }}" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="video_image_left">{{ __('Choose New Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="video_image_left" id="video_image_left">
                                            </div>
                                            <p class="help-block text-info">{{ __('Upload 388X388 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                            @if ($errors->has('video_image_left'))
                                                <p class="text-danger"> {{ $errors->first('video_image_left') }} </p>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Right Image') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <img class="mw-400 mb-3 img-demo show-img" src="{{ asset('assets/front/img/'.$static->video_image_right) }}" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="video_image_right">{{ __('Choose New Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="video_image_right" id="video_image_right">
                                            </div>
                                            <p class="help-block text-info">{{ __('Upload 388X388 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                            @if ($errors->has('video_image_right'))
                                                <p class="text-danger"> {{ $errors->first('video_image_right') }} </p>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Title') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="video_title" placeholder="{{ __('Title') }}" value="{{ $static->video_title }}">
                                            @if ($errors->has('video_title'))
                                                <p class="text-danger"> {{ $errors->first('video_title') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('Subtitle') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="video_sub_title" placeholder="{{ __('Subtitle') }}" value="{{ $static->video_sub_title }}">
                                            @if ($errors->has('video_sub_title'))
                                                <p class="text-danger"> {{ $errors->first('video_sub_title') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('Text') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <textarea name="video_text" class="form-control" rows="5" placeholder="{{ __('Text') }}">{{ $static->video_text }}</textarea>
                                            @if ($errors->has('video_text'))
                                                <p class="text-danger"> {{ $errors->first('video_text') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('Content') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <textarea name="video_content" class="form-control" rows="5" placeholder="{{ __('Content') }}">{{ $static->video_content }}</textarea>
                                            @if ($errors->has('video_content'))
                                                <p class="text-danger"> {{ $errors->first('video_content') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('Video Link') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="video_link" placeholder="{{ __('Video Link') }}" value="{{ $static->video_link }}">
                                            @if ($errors->has('video_link'))
                                                <p class="text-danger"> {{ $errors->first('video_link') }} </p>
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
