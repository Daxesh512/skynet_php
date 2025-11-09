@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Why Choose Us') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Why Choose Us') }}</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Why Choose List') }}</h3>
                        <div class="card-tools d-flex">
                            <div class="d-inline-block mr-4">
                                <select class="form-control lang languageSelect" data="{{url()->current() . '?language='}}">
                                    @foreach($langs as $lang)
                                        <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}} >{{$lang->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a href="{{ route('admin.wcu.add'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> {{ __('Add') }}
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('Icon') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Order') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($why_selects as $id=>$data)
                            <tr>
                                <td>
                                    {{ $id }}
                                </td>
                                <td>
                                    <i class="{{ $data->icon }}"></i>
                                </td>
                                <td>
                                    {{ $data->title }}
                                </td>
                                <td>
                                    {{ $data->serial_number }}
                                </td>
                                <td>
                                    @if($data->status == 1)
                                        <span class="badge badge-success">{{ __('Publish') }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ __('Unpublish') }}</span>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('admin.wcu.edit', $data->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>
                                    <form  id="deleteform" class="d-inline-block" action="{{ route('admin.wcu.delete', $data->id ) }}" method="post">
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
                </div>
            </div>
            <div class="col-lg-6">
                    <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1">{{ __('Why Choose Us Info') }}</h3>
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
                                <form class="form-horizontal" action="{{ route('admin.why_chooseus_update', $static->language_id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                   
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Image1') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <img class="mw-400 mb-3 img-demo show-img" src="{{ asset('assets/front/img/'.$static->w_c_us_image1) }}" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="w_c_us_image1">{{ __('Choose New Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="w_c_us_image1" id="w_c_us_image1">
                                            </div>
                                            <p class="help-block text-info">{{ __('Upload 370X344 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                            @if ($errors->has('w_c_us_image1'))
                                                <p class="text-danger"> {{ $errors->first('w_c_us_image1') }} </p>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Image2') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <img class="mw-400 mb-3 img-demo show-img" src="{{ asset('assets/front/img/'.$static->w_c_us_image2) }}" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="w_c_us_image2">{{ __('Choose New Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="w_c_us_image2" id="w_c_us_image2">
                                            </div>
                                            <p class="help-block text-info">{{ __('Upload 370X344 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                            @if ($errors->has('w_c_us_image2'))
                                                <p class="text-danger"> {{ $errors->first('w_c_us_image2') }} </p>
                                            @endif
                                        </div>

                                    </div>
                               
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Title') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="w_c_us_title" placeholder="{{ __('Title') }}" value="{{ $static->w_c_us_title }}">
                                            @if ($errors->has('w_c_us_title'))
                                                <p class="text-danger"> {{ $errors->first('w_c_us_title') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('Subtitle') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="w_c_us_sub_title" placeholder="{{ __('Subtitle') }}" value="{{ $static->w_c_us_sub_title }}">
                                            @if ($errors->has('w_c_us_sub_title'))
                                                <p class="text-danger"> {{ $errors->first('w_c_us_sub_title') }} </p>
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
