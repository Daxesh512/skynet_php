@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Job') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Job') }}</li>
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
                                <h3 class="card-title mt-1">{{ __('Edit Job') }}</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.job'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('admin.job.update',$job->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Language') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control lang" name="language_id" id="job_lan">
                                                <option value="" selected disabled>Select a Language</option>
                                                @foreach($langs as $lang)
                                                    <option value="{{$lang->id}}" {{ $job->language_id == $lang->id ? 'selected' : '' }} >{{$lang->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('language_id'))
                                                <p class="text-danger"> {{ $errors->first('language_id') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 control-label">{{ __('Title') }}<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" placeholder="{{ __('Title') }}" value="{{ $job->title }}">
                                            @if ($errors->has('title'))
                                                <p class="text-danger"> {{ $errors->first('title') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="bcategory_id" class="col-sm-2 control-label">{{ __('Category') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="jcategory_id" id="job_category_id">
                                                @foreach ($jcategories as $jcategory)
                                                    <option value="{{ $jcategory->id }}" {{ $jcategory->id == $job->jcategory_id ? 'selected' : '' }} >{{ $jcategory->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('jcategory_id'))
                                                <p class="text-danger"> {{ $errors->first('jcategory_id') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                

                                    <div class="form-group row">
                                        <label for="position" class="col-sm-2 control-label">{{ __('Job Position') }}<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="position" placeholder="{{ __('Job Position') }}" value="{{ $job->position }}">
                                            @if ($errors->has('position'))
                                                <p class="text-danger"> {{ $errors->first('position') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="company_name" class="col-sm-2 control-label">{{ __('Company Name') }}<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="company_name" placeholder="{{ __('Company Name') }}" value="{{ $job->company_name }}">
                                            @if ($errors->has('company_name'))
                                                <p class="text-danger"> {{ $errors->first('company_name') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="vacancy" class="col-sm-2 control-label">{{ __('Vacancy') }}<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="vacancy" placeholder="{{ __('Vacancy') }}" value="{{ $job->vacancy }}">
                                            @if ($errors->has('vacancy'))
                                                <p class="text-danger"> {{ $errors->first('vacancy') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="job_responsibility" class="col-sm-2 control-label">{{ __('Job Responsibility') }}<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                                <textarea name="job_responsibility" class="form-control summernote" id="ck" placeholder="{{ __('Job Responsibility') }}">{{  $job->job_responsibility }}</textarea>
                                            @if ($errors->has('job_responsibility'))
                                                <p class="text-danger"> {{ $errors->first('job_responsibility') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="job_context" class="col-sm-2 control-label">{{ __('Job Context') }}</label>
                                        <div class="col-sm-10">
                                                <textarea name="job_context" class="form-control summernote" id="ck" placeholder="{{ __('Job Context') }}">{{ $job->job_context }}</textarea>
                                            @if ($errors->has('job_context'))
                                                <p class="text-danger"> {{ $errors->first('job_context') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="education_requirement" class="col-sm-2 control-label">{{ __('Educational Requirements') }}</label>

                                        <div class="col-sm-10">
                                                <textarea name="education_requirement" class="form-control summernote" id="ck" placeholder="{{ __('Educational Requirements') }}">{{ $job->education_requirement }}</textarea>
                                            @if ($errors->has('content'))
                                                <p class="text-danger"> {{ $errors->first('education_requirement') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="experience_requirement" class="col-sm-2 control-label">{{ __('Experience Requirements') }}</label>

                                        <div class="col-sm-10">
                                                <textarea name="experience_requirement" class="form-control summernote" id="ck" placeholder="{{ __('Experience Requirements') }}">{{ $job->experience_requirement }}</textarea>
                                            @if ($errors->has('content'))
                                                <p class="text-danger"> {{ $errors->first('experience_requirement') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="additional_requirement" class="col-sm-2 control-label">{{ __('Additional Requirements') }}</label>

                                        <div class="col-sm-10">
                                                <textarea name="additional_requirement" class="form-control summernote" id="ck" placeholder="{{ __('Additional Requirements') }}">{{ $job->additional_requirement }}</textarea>
                                            @if ($errors->has('content'))
                                                <p class="text-danger"> {{ $errors->first('additional_requirement') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="employment_status" class="col-sm-2 control-label">{{ __('Employment Status') }}<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <select name="employment_status" class="form-control">
                                                <option {{$job->employment_status == 'full_time' ? 'selected' : ''}} value="Full-Time">{{__('Full-Time')}}</option>
                                                <option {{$job->employment_status == 'part_time' ? 'selected' : ''}}  value="Part-Time">{{__('Part-Time')}}</option>
                                                <option {{$job->employment_status == 'project_based' ? 'selected' : ''}}   value="Project Based">{{__('Project Based')}}</option>
                                            </select>
                                            @if ($errors->has('employment_status'))
                                                <p class="text-danger"> {{ $errors->first('employment_status') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="job_location" class="col-sm-2 control-label">{{ __('Job Location') }} <span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="job_location" placeholder="{{ __('Job Location') }}" value="{{ $job->job_location }}">
                                            @if ($errors->has('job_location'))
                                                <p class="text-danger"> {{ $errors->first('job_location') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="other_benefits" class="col-sm-2 control-label">{{ __('Compensation & Other Benefits') }}</label>

                                        <div class="col-sm-10">
                                                <textarea name="other_benefits" class="form-control summernote" id="ck" placeholder="{{ __('Compensation & Other Benefits') }}">{{ $job->other_benefits }}</textarea>
                                            @if ($errors->has('content'))
                                                <p class="text-danger"> {{ $errors->first('other_benefits') }} </p>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="salary" class="col-sm-2 control-label">{{ __('Salary') }}<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="salary" placeholder="{{ __('Salary') }}" value="{{ $job->salary }}">
                                            @if ($errors->has('salary'))
                                                <p class="text-danger"> {{ $errors->first('salary') }} </p>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="deadline" class="col-sm-2 control-label">{{ __('Deadline') }}<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  id="submission_date" name="deadline" placeholder="{{ __('Deadline') }}" value="{{ $job->deadline }}">
                                            @if ($errors->has('deadline'))
                                                <p class="text-danger"> {{ $errors->first('deadline') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="meta_tags" class="col-sm-2 control-label">{{ __('Meta Tags') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" data-role="tagsinput" name="meta_tags" placeholder="{{ __('Meta Tags') }}" value="{{ $job->meta_tags }}">
                                            @if ($errors->has('meta_tags'))
                                                <p class="text-danger"> {{ $errors->first('meta_tags') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="meta_description" class="col-sm-2 control-label">{{ __('Meta Description') }}</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="meta_description" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $job->meta_description }}</textarea>
                                            @if ($errors->has('meta_description'))
                                                <p class="text-danger"> {{ $errors->first('meta_description') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 control-label">{{ __('Status') }}<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="status">
                                                <option value="0" {{ $job->status == '0' ? 'selected' : '' }}>{{ __('Unpublish') }}</option>
                                                <option value="1" {{ $job->status == '1' ? 'selected' : '' }}>{{ __('Publish') }}</option>
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
                        </div>
            </div>
        </div>
    </div>
</section>


@endsection

