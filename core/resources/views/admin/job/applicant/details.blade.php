
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
           <tbody>
              <tr>
                 <td width="35%">{{ __('Applicant Name') }}</td>
                 <td>{{ $apply->name }}</td>
              </tr>
              <tr>
                 <td width="35%">{{ __('Applicant Email') }}</td>
                 <td>{{ $apply->email }}</td>
              </tr>
              <tr>
                 <td width="35%">{{ __('Job Position') }}</td>
                 <td> {{ $apply->type }}</td>
              </tr>
              <tr>
                 <td width="35%">{{ __('Applicant Expected Salary') }}</td>
                 <td>{{ $apply->expected_salary }}</td>
              </tr>
              <tr>
                 <td width="35%">{{ __('Applicant Message') }}</td>
                 <td>{{ $apply->message }}</td>
              </tr>
              <tr class="attachment_list">
                 <td width="35%">{{ __('Applicant CV') }}</td>
                 <td><a href="{{ asset('assets/front/application/'.$apply->file) }}" class="btn btn-sm btn-info" download="">{{ __('Download Cv') }}</a></td>
              </tr>
              <tr class="attachment_list">
                 <td width="35%">{{ __('Applicant Selected Mail') }}</td>
                 <td>
                     <a href="mailto:{{ $apply->email }}" class="btn btn-primary">Send Mail</a>
 
                 </td>
              </tr>
           </tbody>
        </table>
     </div>
 
 