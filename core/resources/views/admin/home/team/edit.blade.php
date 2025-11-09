@extends('admin.layout')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('team') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('team') }}</li>
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
                                <h3 class="card-title mt-1">{{ __('Edit Team') }}</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.team'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('admin.team.update',$team->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Language') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control lang" name="language_id">
                                                @foreach($langs as $lang)
                                                    <option value="{{$lang->id}}" {{ $team->language_id == $lang->id ? 'selected' : '' }} >{{$lang->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('language_id'))
                                                <p class="text-danger"> {{ $errors->first('language_id') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 control-label">{{ __('Image') }}<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <img class="w-400 mb-3 show-img img-demo" src="{{ $team->image ? asset('assets/front/img/team/'.$team->image) : asset('assets/admin/img/img-demo.jpg') }}" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="image">{{ __('Choose Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="image" id="image">
                                            </div>
                                            @if ($errors->has('image'))
                                                <p class="text-danger"> {{ $errors->first('image') }} </p>
                                            @endif
                                            <p class="help-block text-info">{{ __('Upload 70X70 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 control-label">{{ __('Name') }}<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" placeholder="{{ __('Name') }}" value="{{ $team->name }}">
                                            @if ($errors->has('name'))
                                                <p class="text-danger"> {{ $errors->first('name') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="designation" class="col-sm-2 control-label">{{ __('Dagenation') }}<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="dagenation" placeholder="{{ __('Dagenation') }}" value="{{ $team->dagenation }}">
                                            @if ($errors->has('dagenation'))
                                                <p class="text-danger"> {{ $errors->first('dagenation') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('Description') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <textarea name="description" class="form-control summernote" rows="5" placeholder="{{ __('Description') }}">{{ $team->description }}</textarea>
                                            @if ($errors->has('description'))
                                                <p class="text-danger"> {{ $errors->first('description') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="icon1" class="col-sm-2 control-label">{{ __('Social Icon 1') }}<span class="d-block"><small>{{ __('(Fontawesome icon class )') }}</small></span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="icon1" placeholder="{{ __('Social Icon 1') }}" value="{{ $team->icon1 }}">
                                            @if ($errors->has('icon1'))
                                            <p class="text-danger"> {{ $errors->first('icon1') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="url1" class="col-sm-2 control-label">{{ __('Social Url 1') }}</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="url1" placeholder="{{ __('Social Url 1') }}" value="{{ $team->url1 }}">
                                            @if ($errors->has('url1'))
                                                <p class="text-danger"> {{ $errors->first('url1') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Social Icon 2') }}<span class="d-block"><small>{{ __('(Fontawesome icon class )') }}</small></span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="icon2" placeholder="{{ __('Social Icon 2') }}" value="{{ $team->icon2 }}">
                                            @if ($errors->has('icon2'))
                                            <p class="text-danger"> {{ $errors->first('icon2') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="url2" class="col-sm-2 control-label">{{ __('Social Url 2') }}</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="url2" placeholder="{{ __('Social Url 2') }}" value="{{ $team->url2 }}">
                                            @if ($errors->has('url2'))
                                                <p class="text-danger"> {{ $errors->first('url2') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Social Icon 3') }}<span class="d-block"><small>{{ __('(Fontawesome icon class )') }}</small></span></label>

                                        <div class="col-sm-10">
                                           <input type="text" class="form-control" name="icon3" placeholder="{{ __('Social Icon 3') }}" value="{{ $team->icon3 }}">
                                            @if ($errors->has('icon3'))
                                            <p class="text-danger"> {{ $errors->first('icon3') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="url3" class="col-sm-2 control-label">{{ __('Social Url 3') }}</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="url3" placeholder="{{ __('Social Url 3') }}" value="{{ $team->url3 }}">
                                            @if ($errors->has('url3'))
                                                <p class="text-danger"> {{ $errors->first('url3') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Social Icon 4') }}<span class="d-block"><small>{{ __('(Fontawesome icon class )') }}</small></span></label>

                                        <div class="col-sm-10">
                                           <input type="text" class="form-control" name="icon4" placeholder="{{ __('Social Icon 4') }}" value="{{ $team->icon4 }}">
                                            @if ($errors->has('icon4'))
                                            <p class="text-danger"> {{ $errors->first('icon4') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="url3" class="col-sm-2 control-label">{{ __('Social Url 4') }}</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="url4" placeholder="{{ __('Social Url 4') }}" value="{{ $team->url4 }}">
                                            @if ($errors->has('url4'))
                                                <p class="text-danger"> {{ $errors->first('url4') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Social Icon 5') }}<span class="d-block"><small>{{ __('(Fontawesome icon class )') }}</small></span></label>

                                        <div class="col-sm-10">
                                           <input type="text" class="form-control" name="icon5" placeholder="{{ __('Social Icon 5') }}" value="{{ $team->icon5 }}">
                                            @if ($errors->has('icon5'))
                                            <p class="text-danger"> {{ $errors->first('icon5') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="url3" class="col-sm-2 control-label">{{ __('Social Url 5') }}</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="url5" placeholder="{{ __('Social Url 5') }}" value="{{ $team->url5 }}">
                                            @if ($errors->has('url5'))
                                                <p class="text-danger"> {{ $errors->first('url5') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('Order') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="serial_number" placeholder="{{ __('Order') }}" value="{{ $team->serial_number }}">
                                            @if ($errors->has('serial_number'))
                                                <p class="text-danger"> {{ $errors->first('serial_number') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="status" class="col-sm-2 control-label">{{ __('Status') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status">
                                               <option value="0" {{ $team->status == '0' ? 'selected' : '' }}>{{ __('Unpublish') }}</option>
                                               <option value="1" {{ $team->status == '1' ? 'selected' : '' }}>{{ __('Publish') }}</option>
                                              </select>
                                            @if ($errors->has('status'))
                                                <p class="text-danger"> {{ $errors->first('status') }} </p>
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
