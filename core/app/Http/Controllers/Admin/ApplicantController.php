<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;

class ApplicantController extends Controller
{
    public function applicants()
    {
        $applicants = JobApplication::orderBy('id', 'DESC')->get();

        return view('admin.job.applicant.index', compact('applicants'));
    }

    public function pending()
    {
        $applicants = JobApplication::where('status', '0')->orderBy('id', 'DESC')->get();

        return view('admin.job.applicant.index', compact('applicants'));
    }
    public function interviewing()
    {
        $applicants = JobApplication::where('status', '1')->orderBy('id', 'DESC')->get();

        return view('admin.job.applicant.index', compact('applicants'));
    }

    public function selected()
    {
        $applicants = JobApplication::where('status', '2')->orderBy('id', 'DESC')->get();

        return view('admin.job.applicant.index', compact('applicants'));
    }
    public function rejected()
    {
        $applicants = JobApplication::where('status', '3')->orderBy('id', 'DESC')->get();

        return view('admin.job.applicant.index', compact('applicants'));
    }


    public function applicant_details($id)
    {
        $apply = JobApplication::findOrFail($id);

        return view('admin.job.applicant.details', compact('apply'));
    }



    public function applicant_delete($apply_id)
    {
        $data = JobApplication::findOrFail($apply_id);


        @unlink('assets/front/application/' . $data->file);
        $data->delete();


        $notification = array(
            'messege' => 'Application Deleted Successfully',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

    }

    public function status(Request $request)
    {

        $po = JobApplication::find($request->applicant_id);
        $po->status = $request->status;
        $po->save();


        $notification = array(
            'messege' => 'Application status changed successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }
}
