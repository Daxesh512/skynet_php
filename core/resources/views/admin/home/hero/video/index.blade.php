@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Video') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Video') }}</li>
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
                                <h3 class="card-title mt-1">{{ __('Video Info') }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('admin.herovideo.update') }}" method="POST">
                                    @csrf
                                  
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Active Video Section') }}<span
                                                    class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="checkbox" {{ $visibility->is_video_hero == '1' ? 'checked' : '' }} data-size="large" name="is_video_hero" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Active" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Deactivate">
                                            @if ($errors->has('is_video_hero'))
                                                <p class="text-danger"> {{ $errors->first('is_video_hero') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Video Link') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="hero_section_video_link" placeholder="{{ __('Video Link') }}" value="{{ $commonsetting->hero_section_video_link }}">
                                            @if ($errors->has('hero_section_video_link'))
                                                <p class="text-danger"> {{ $errors->first('hero_section_video_link') }} </p>
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
