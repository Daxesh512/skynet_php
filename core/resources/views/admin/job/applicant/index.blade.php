@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Applicants') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Applicants') }}</li>
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
                    <h3 class="card-title">{{ __('Applicants List:') }}</h3>
                    <div class="card-tools">
                      <form class="d-inline-block mr-3" action="{{route('back.bulk.delete')}}" method="get">
                        <input type="hidden" value="" name="ids[]" id="bulk_delete">
                        <input type="hidden" value="applicant" name="table">
                        <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> {{__('Bulk Delete')}}</button>
                    </form>

                      </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" data-target="applicant-bulk-delete" class="bulk_all_delete"></th>
                                <th>{{ __('Job Title') }}</th>
                                <th>{{ __('Job Position') }}</th>
                                <th>{{ __('Apply Date') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($applicants as $id=>$applicant)

                            <tr id="applicant-bulk-delete">
                                <th>
                                  <input type="checkbox" class="bulk-item" value="{{ $applicant->id}} ">
                                </th>

                                <td>
                                    {{ $applicant->job_title }}
                                </td>

                                <td>
                                    {{ $applicant->type }}
                                </td>

                                <td>
                                    {{$applicant->created_at->diffForHumans()}}
                                </td>

                                <td>
                                    <form id="statusForm{{$applicant->id}}" class="d-inline-block" action="{{route('admin.application.status')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="applicant_id" value="{{$applicant->id}}">
                                        <select class="form-control form-control-sm
                                        @if ($applicant->status == '0')
                                          bg-primary
                                        @elseif ($applicant->status == '1')
                                          bg-info
                                        @elseif ($applicant->status == '2')
                                          bg-success
                                        @elseif ($applicant->status == '3')
                                          bg-danger
                                        @endif
                                        " name="status" onchange="document.getElementById('statusForm{{$applicant->id}}').submit();">
                                          <option value="0" {{$applicant->status == '0' ? 'selected' : ''}}>Pending</option>
                                          <option value="1" {{$applicant->status == '1' ? 'selected' : ''}}>Interviewing</option>
                                          <option value="2" {{$applicant->status == '2' ? 'selected' : ''}}>Selected</option>
                                          <option value="3" {{$applicant->status == '3' ? 'selected' : ''}}>Rejected</option>
                                        </select>
                                      </form>
                                </td>
                                <td>
                                    <button type="button" data-href="{{ route('admin.applicant.details',$applicant->id) }}" class="btn btn-primary view_applicant_details btn-sm" data-toggle="modal" data-target="#view_job_details_modal">
                                        <i class="fas fa-eye"></i> {{ __('View') }}
                                      </button>


                                    <form  id="deleteform" class="d-inline-block" action="{{ route('admin.applicant.delete', $applicant->id ) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $applicant->id }}">
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
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="modal fade" id="view_job_details_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">{{ __('View Applicant Information') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" id="info_view">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
          </div>
        </div>
      </div>

</section>
@endsection

