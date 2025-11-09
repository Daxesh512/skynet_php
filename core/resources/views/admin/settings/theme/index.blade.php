@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Theme Versions') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Theme Versions') }}</li>
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
                                <h3 class="card-title mt-1">{{ __('Activate Theme Version') }}</h3>
                                
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body themeselect">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <img class="tag" src="{{asset('assets/admin/img/new-corner-label.png')}}" alt="">
                                                <img src="{{asset('assets/admin/img/t9.png')}}" alt=""
                                                     style="width:100%;">
                                                <h4 class="text-center mt-3 mb-0">Theme Eight</h4>
                                            </div>
                                            <div class="card-footer text-center">
                                                @if ($commonsetting->theme_version == 'theme9')
                                                    <button type="submit"
                                                            class="btn btn-primary btn-sm">
                                                        Active
                                                    </button>
                                                @else
                                                    <form class="deleteform d-inline-block"
                                                          action="{{route('admin.theme_version.update')}}"
                                                          method="post">
                                                        @csrf
                                                        <input type="hidden" name="theme_version" value="theme9">
                                                        <button type="submit"
                                                                class="btn btn-info btn-sm confirmbtn">
                                                                  <span class="btn-label">
                                                                    <i class="fas fa-arrow-alt-circle-down"></i>
                                                                  </span>
                                                            Activate
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <img class="tag" src="{{asset('assets/admin/img/new-corner-label.png')}}" alt="">
                                                <img src="{{asset('assets/admin/img/t8.png')}}" alt=""
                                                     style="width:100%;">
                                                <h4 class="text-center mt-3 mb-0">Theme Eight</h4>
                                            </div>
                                            <div class="card-footer text-center">
                                                @if ($commonsetting->theme_version == 'theme8')
                                                    <button type="submit"
                                                            class="btn btn-primary btn-sm">
                                                        Active
                                                    </button>
                                                @else
                                                    <form class="deleteform d-inline-block"
                                                          action="{{route('admin.theme_version.update')}}"
                                                          method="post">
                                                        @csrf
                                                        <input type="hidden" name="theme_version" value="theme8">
                                                        <button type="submit"
                                                                class="btn btn-info btn-sm confirmbtn">
                                                                  <span class="btn-label">
                                                                    <i class="fas fa-arrow-alt-circle-down"></i>
                                                                  </span>
                                                            Activate
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <img class="tag" src="{{asset('assets/admin/img/new-corner-label.png')}}" alt="">
                                                <img src="{{asset('assets/admin/img/t7.png')}}" alt=""
                                                     style="width:100%;">
                                                <h4 class="text-center mt-3 mb-0">Theme Seven</h4>
                                            </div>
                                            <div class="card-footer text-center">
                                                @if ($commonsetting->theme_version == 'theme7')
                                                    <button type="submit"
                                                            class="btn btn-primary btn-sm">
                                                        Active
                                                    </button>
                                                @else
                                                    <form class="deleteform d-inline-block"
                                                          action="{{route('admin.theme_version.update')}}"
                                                          method="post">
                                                        @csrf
                                                        <input type="hidden" name="theme_version" value="theme7">
                                                        <button type="submit"
                                                                class="btn btn-info btn-sm confirmbtn">
                                                                  <span class="btn-label">
                                                                    <i class="fas fa-arrow-alt-circle-down"></i>
                                                                  </span>
                                                            Activate
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{asset('assets/admin/img/t6.png')}}" alt=""
                                                     style="width:100%;">
                                                <h4 class="text-center mt-3 mb-0">Theme Six</h4>
                                            </div>
                                            <div class="card-footer text-center">
                                                @if ($commonsetting->theme_version == 'theme6')
                                                    <button type="submit"
                                                            class="btn btn-primary btn-sm">
                                                        Active
                                                    </button>
                                                @else
                                                    <form class="deleteform d-inline-block"
                                                          action="{{route('admin.theme_version.update')}}"
                                                          method="post">
                                                        @csrf
                                                        <input type="hidden" name="theme_version" value="theme6">
                                                        <button type="submit"
                                                                class="btn btn-info btn-sm confirmbtn">
                                                                  <span class="btn-label">
                                                                    <i class="fas fa-arrow-alt-circle-down"></i>
                                                                  </span>
                                                            Activate
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{asset('assets/admin/img/t5.png')}}" alt=""
                                                     style="width:100%;">
                                                <h4 class="text-center mt-3 mb-0">Theme Five</h4>
                                            </div>
                                            <div class="card-footer text-center">
                                                @if ($commonsetting->theme_version == 'theme5')
                                                    <button type="submit"
                                                            class="btn btn-primary btn-sm">
                                                        Active
                                                    </button>
                                                @else
                                                    <form class="deleteform d-inline-block"
                                                          action="{{route('admin.theme_version.update')}}"
                                                          method="post">
                                                        @csrf
                                                        <input type="hidden" name="theme_version" value="theme5">
                                                        <button type="submit"
                                                                class="btn btn-info btn-sm confirmbtn">
                                                                  <span class="btn-label">
                                                                    <i class="fas fa-arrow-alt-circle-down"></i>
                                                                  </span>
                                                            Activate
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{asset('assets/admin/img/t4.png')}}" alt=""
                                                     style="width:100%;">
                                                <h4 class="text-center mt-3 mb-0">Theme Four</h4>
                                            </div>
                                            <div class="card-footer text-center">
                                                @if ($commonsetting->theme_version == 'theme4')
                                                    <button type="submit"
                                                            class="btn btn-primary btn-sm">
                                                        Active
                                                    </button>
                                                @else
                                                    <form class="deleteform d-inline-block"
                                                          action="{{route('admin.theme_version.update')}}"
                                                          method="post">
                                                        @csrf
                                                        <input type="hidden" name="theme_version" value="theme4">
                                                        <button type="submit"
                                                                class="btn btn-info btn-sm confirmbtn">
                                                                  <span class="btn-label">
                                                                    <i class="fas fa-arrow-alt-circle-down"></i>
                                                                  </span>
                                                            Activate
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{asset('assets/admin/img/t3.jpg')}}" alt=""
                                                     style="width:100%;">
                                                <h4 class="text-center mt-3 mb-0">Theme Three</h4>
                                            </div>
                                            <div class="card-footer text-center">
                                                @if ($commonsetting->theme_version == 'theme3')
                                                    <button type="submit"
                                                            class="btn btn-primary btn-sm">
                                                        Active
                                                    </button>
                                                @else
                                                    <form class="deleteform d-inline-block"
                                                          action="{{route('admin.theme_version.update')}}"
                                                          method="post">
                                                        @csrf
                                                        <input type="hidden" name="theme_version" value="theme3">
                                                        <button type="submit"
                                                                class="btn btn-info btn-sm confirmbtn">
                                                              <span class="btn-label">
                                                                <i class="fas fa-arrow-alt-circle-down"></i>
                                                              </span>
                                                            Activate
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{asset('assets/admin/img/t2.png')}}" alt=""
                                                     style="width:100%;">
                                                <h4 class="text-center mt-3 mb-0">Theme Two</h4>
                                            </div>
                                            <div class="card-footer text-center">
                                                @if ($commonsetting->theme_version == 'theme2')
                                                    <button type="submit"
                                                            class="btn btn-primary btn-sm">
                                                        Active
                                                    </button>
                                                @else
                                                    <form class="deleteform d-inline-block"
                                                          action="{{route('admin.theme_version.update')}}"
                                                          method="post">
                                                        @csrf
                                                        <input type="hidden" name="theme_version" value="theme2">
                                                        <button type="submit"
                                                                class="btn btn-info btn-sm confirmbtn">
                                                              <span class="btn-label">
                                                                <i class="fas fa-arrow-alt-circle-down"></i>
                                                              </span>
                                                            Activate
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{asset('assets/admin/img/t1.png')}}" alt=""
                                                     style="width:100%;">
                                                <h4 class="text-center mt-3 mb-0">Theme One</h4>
                                            </div>
                                            <div class="card-footer text-center">
                                                @if ($commonsetting->theme_version == 'theme1')
                                                    <button type="submit"
                                                            class="btn btn-primary btn-sm">
                                                        Active
                                                    </button>
                                                @else
                                                    <form class="deleteform d-inline-block"
                                                          action="{{route('admin.theme_version.update')}}"
                                                          method="post">
                                                        @csrf
                                                        <input type="hidden" name="theme_version" value="theme1">
                                                        <button type="submit"
                                                                class="btn btn-info btn-sm">
                                                                  <span class="btn-label">
                                                                    <i class="fas fa-arrow-alt-circle-down"></i>
                                                                  </span>
                                                            Activate
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
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
