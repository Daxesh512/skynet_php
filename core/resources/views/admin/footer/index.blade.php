@extends('admin.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Footer') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                    class="fas fa-home"></i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('Footer') }}</li>
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
                            <h3 class="card-title">{{ __('Footer Information') }} </h3>
                            <div class="card-tools">
                                <div class="d-inline-block">
                                    <select class="form-control lang" id="languageSelect"
                                        data="{{ url()->current() . '?language=' }}">
                                        @foreach ($langs as $lang)
                                            <option value="{{ $lang->code }}"
                                                {{ $lang->code == request()->input('language') ? 'selected' : '' }}>
                                                {{ $lang->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body">
                            <form class="form-horizontal"
                                action="{{ route('admin.footer.update', $footerinfo->language_id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">{{ __('Footer Logo') }} <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/front/img/' . $footerinfo->footer_logo) }}" alt="">
                                        <div class="custom-file">
                                            <label class="custom-file-label"
                                                for="footer_logo">{{ __('Choose New Image') }}</label>
                                            <input type="file" class="custom-file-input up-img" name="footer_logo"
                                                id="footer_logo">
                                        </div>
                                        <p class="help-block text-info">
                                            {{ __('Upload 1920X600 (Pixel) Size image or Squre size image for best quality.
                                                                                                    Only jpg, jpeg, png image is allowed.') }}
                                        </p>
                                        @if ($errors->has('footer_logo'))
                                            <p class="text-danger"> {{ $errors->first('footer_logo') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">{{ __('Footer BG Image') }} <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/front/img/' . $footerinfo->footer_bg_image) }}"
                                            alt="">
                                        <div class="custom-file">
                                            <label class="custom-file-label"
                                                for="footer_bg_image">{{ __('Choose New Image') }}</label>
                                            <input type="file" class="custom-file-input up-img" name="footer_bg_image"
                                                id="footer_bg_image">
                                        </div>
                                        <p class="help-block text-info">
                                            {{ __('Upload 1920X600 (Pixel) Size image or Squre size image for best quality.
                                                                                                    Only jpg, jpeg, png image is allowed.') }}
                                        </p>
                                        @if ($errors->has('footer_bg_image'))
                                            <p class="text-danger"> {{ $errors->first('footer_bg_image') }} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">{{ __('Footer Text') }}<span
                                            class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control textarea" name="footer_text" placeholder="{{ __('Footer Text') }}">{{ $footerinfo->footer_text }}</textarea>
                                        @if ($errors->has('footer_text'))
                                            <p class="text-danger"> {{ $errors->first('footer_text') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">{{ __('Copyright Text') }}<span
                                            class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control summernote" name="copyright_text"
                                            placeholder="{{ __('Copyright Text') }}">{{ $footerinfo->copyright_text }}</textarea>
                                        @if ($errors->has('copyright_text'))
                                            <p class="text-danger"> {{ $errors->first('copyright_text') }} </p>
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
                        <!-- /.box-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
        </div>


    </section>
@endsection
