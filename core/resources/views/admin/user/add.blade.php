@extends('admin.layout')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('User Role') }} </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                class="fas fa-home"></i>{{ __('Home') }}</a></li>
          <li class="breadcrumb-item">{{ __('User Role') }}</li>
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
            <h3 class="card-title mt-1">{{ __('Add User & Role') }}</h3>
            <div class="card-tools">
              <a href="{{ route('admin.user.index') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
              </a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <div class="row justify-content-center">
                  <div class="col-lg-8">
                    <form  class="" action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">{{ __('Image') }} <span class="text-danger">*</span></label>
        
                            <div class="col-sm-12">
                                <img class="mw-400 mb-3 show-img img-demo" src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="image">{{ __('Choose Image') }}</label>
                                    <input type="file" class="custom-file-input up-img" name="image" id="image">
                                </div>
                                <p class="help-block text-info">{{ __('Upload 70X70 (Pixel) Size image for best quality.
                                    Only jpg, jpeg, png image is allowed.') }}
                                </p>
                                @if ($errors->has('image'))
                                    <p class="text-danger"> {{ $errors->first('image') }} </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label for="">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <p class="text-danger"> {{ $errors->first('name') }} </p>
                                @endif
                              </div>
                            </div>
                          </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="">Username <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="username" placeholder="Enter username" value="{{ old('username') }}">
                              @if ($errors->has('username'))
                                  <p class="text-danger"> {{ $errors->first('username') }} </p>
                              @endif
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="">Email <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}">
                              @if ($errors->has('email'))
                                  <p class="text-danger"> {{ $errors->first('email') }} </p>
                              @endif
                            </div>
                          </div>
                        </div>
              
                       
              
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="">Password <span class="text-danger">*</span></label>
                              <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                              @if ($errors->has('password'))
                                  <p class="text-danger"> {{ $errors->first('password') }} </p>
                              @endif
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="">Re-type Password <span class="text-danger">*</span></label>
                              <input type="password" class="form-control" name="password_confirmation" placeholder="Enter your password again" value="{{ old('password_confirmation') }}">
                              @if ($errors->has('password_confirmation'))
                                  <p class="text-danger"> {{ $errors->first('password_confirmation') }} </p>
                              @endif
                            </div>
                          </div>
                        </div>
              
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="">Role <span class="text-danger">*</span></label>
                                <select class="form-control" name="role">
                                    <option value="" selected="" disabled="">Select a Role</option>
                                    @foreach ($roles as $key => $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select> 
                                @if ($errors->has('role'))
                                    <p class="text-danger"> {{ $errors->first('role') }} </p>
                                @endif
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-12 control-label">{{ __('Status') }}<span
                                class="text-danger">*</span></label>
        
                            <div class="col-sm-12">
                              <select class="form-control" name="status">
                                <option value="0">{{ __('Deactive') }}</option>
                                <option value="1">{{ __('Active') }}</option>
                              </select>
                              @if ($errors->has('status'))
                              <p class="text-danger"> {{ $errors->first('status') }} </p>
                              @endif
                            </div>
                          </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </div>
              
                      </form>
                  </div>
              </div>
              

          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->

</section>
@endsection