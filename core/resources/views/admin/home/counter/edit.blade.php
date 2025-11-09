@extends('admin.layout')

@section('content')

<section class="content-header">
    <h1>
       {{ __('About') }}
    </h1>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                            <div class="card-header  with-border">
                                <h3 class="card-title mt-1">{{ __('Edit Fact') }}</h3>
                                <div class="card-tools">
                                <a href="{{ route('admin.counter.index'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                    <form class="form-horizontal" action="{{ route('admin.counter.update', $counter->id) }}" method="POST" >
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label">{{ __('Language') }}<span class="text-danger">*</span></label>
            
                                            <div class="col-sm-10">
                                                <select class="form-control lang" name="language_id">
                                                    @foreach($langs as $lang)
                                                        <option value="{{$lang->id}}" {{ $counter->language_id == $lang->id ? 'selected' : '' }} >{{$lang->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('language_id'))
                                                    <p class="text-danger"> {{ $errors->first('language_id') }} </p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 control-label">{{ __('Title') }}<span class="text-danger">*</span></label>
            
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="title" placeholder="{{ __('Title') }}" value="{{ $counter->title }}">
                                                @if ($errors->has('title'))
                                                <p class="text-danger"> {{ $errors->first('title') }} </p>
                                            @endif
                                            </div>
                                        </div>
            
                                        <div class="form-group row">
                                            <label for="value" class="col-sm-2 control-label">{{ __('Number') }}<span class="text-danger">*</span></label>
            
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="number" placeholder="{{ __('Number') }}" value="{{ $counter->number }}">
                                                @if ($errors->has('number'))
                                                <p class="text-danger"> {{ $errors->first('number') }} </p>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="value" class="col-sm-2 control-label">{{ __('Icon') }}<span class="text-danger">*</span><span class="d-block"><small>{{ __('(Fontawesome icon class )') }}</small></span></label>
            
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="icon" placeholder="{{ __('Icon') }}" value="{{ $counter->icon }}">
                                                @if ($errors->has('icon'))
                                                <p class="text-danger"> {{ $errors->first('icon') }} </p>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label">{{ __('Content') }}<span class="text-danger">*</span></label>
            
                                            <div class="col-sm-10">
                                                <textarea name="text" class="form-control"  rows="3" placeholder="{{ __('Content') }}">{{ $counter->text }}</textarea>
                                                @if ($errors->has('text'))
                                                    <p class="text-danger"> {{ $errors->first('text') }} </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="value" class="col-sm-2 control-label">{{ __('Order') }}<span class="text-danger">*</span></label>
            
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="serial_number" placeholder="{{ __('Order') }}" value="{{ $counter->serial_number }}">
                                                @if ($errors->has('serial_number'))
                                                <p class="text-danger"> {{ $errors->first('serial_number') }} </p>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status" class="col-sm-2 control-label">{{ __('Status') }}<span class="text-danger">*</span></label>
            
                                            <div class="col-sm-10">
                                                <select class="form-control" name="status">
                                                   <option value="0" {{ $counter->status == '0' ? 'selected' : '' }}>{{ __('Unpublish') }}</option>
                                                   <option value="1" {{ $counter->status == '1' ? 'selected' : '' }}>{{ __('Publish') }}</option>
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
