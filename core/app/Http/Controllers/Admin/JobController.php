<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\Language;
use App\Models\Jcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }


    public function jobs(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;
        $data['jobs'] = Job::where('language_id',$lang)->orderBy('id', 'DESC')->get();
        return view('admin.job.index',$data);
    }

    public function add(){
        $jcategories = Jcategory::where('status', 1)->get();
        return view('admin.job.add', compact('jcategories'));
    }

    public function job_get_category($id){

        $jcategories = Jcategory::where('status', 1)->where('language_id', $id)->get();
        $output = '';

        foreach($jcategories as $jcategory){
            $output .= '<option value="'.$jcategory->id.'">'.$jcategory->name.'</option>';
        }
        return $output;
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|string|unique:jobs',
            'language_id' => 'required',
            'position' => 'required|string|max:191',
            'company_name' => 'required|string|max:191',
            'jcategory_id' => 'required',
            'vacancy' => 'required|string|max:191',
            'job_responsibility' => 'required|string',
            'employment_status' => 'required|string',
            'education_requirement' => 'nullable|string',
            'job_context' => 'nullable|string',
            'experience_requirement' => 'nullable|string',
            'additional_requirement' => 'nullable|string',
            'job_location' => 'required|string',
            'salary' => 'required|string',
            'other_benefits' => 'nullable|string',
            'email' => 'nullable|string|max:191',
            'deadline' => 'required|max:191',
            'meta_tags' => 'nullable|string|max:191',
            'meta_description' => 'nullable|string|max:191',
        ]);


        $job = new job();

        $job->language_id = $request->language_id;
        $job->title = $request->title;
        $job->status = $request->status;
        $job->position = $request->position;
        $job->company_name = $request->company_name;
        $job->vacancy = $request->vacancy;
        
        $job->job_responsibility = $request->job_responsibility;
        $job->employment_status = $request->employment_status;
        $job->education_requirement = $request->education_requirement;
        $job->job_context = $request->job_context;
        $job->experience_requirement = $request->experience_requirement;
        $job->additional_requirement = $request->additional_requirement;
        $job->job_location = $request->job_location;
        $job->salary = $request->salary;
        $job->other_benefits = $request->other_benefits;
        $job->slug = Str::slug($request->title, "-");
       
        $job->jcategory_id = $request->jcategory_id;
        $job->email = $request->email;
       
        $job->deadline = $request->deadline;
      
        $job->meta_tags = $request->meta_tags;
        $job->meta_description = $request->meta_description;
       
        $job->save();

        $notification = array(
            'messege' => 'Job Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function delete($id){

        $job = Job::findOrFail($id);
        $job->delete();


        $notification = array(
            'messege' => 'Jop Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function edit($id){
        $job = Job::findOrFail($id);
        $job_lan = $job->language_id;
       
        $jcategories = Jcategory::where('status', 1)->where('language_id', $job_lan)->get();
      
        return view('admin.job.edit', compact('jcategories', 'job'));

    }

    public function update(Request $request, $id){

        $job = Job::findOrFail($request->id);

        $request->validate([
            'title' => 'required|string|unique:jobs,id,'.$id,
            'language_id' => 'required',
            'position' => 'required|string|max:191',
            'company_name' => 'required|string|max:191',
            'jcategory_id' => 'required',
            'vacancy' => 'required|string|max:191',
            'job_responsibility' => 'required|string',
            'employment_status' => 'required|string',
            'education_requirement' => 'nullable|string',
            'job_context' => 'nullable|string',
            'experience_requirement' => 'nullable|string',
            'additional_requirement' => 'nullable|string',
            'job_location' => 'required|string',
            'salary' => 'required|string',
            'other_benefits' => 'nullable|string',
            'email' => 'nullable|string|max:191',
            'deadline' => 'required|string|max:191',
            'meta_tags' => 'nullable|string|max:191',
            'meta_description' => 'nullable|string|max:191',
        ]);

        $job->language_id = $request->language_id;
        $job->title = $request->title;
        $job->status = $request->status;
        $job->position = $request->position;
        $job->company_name = $request->company_name;
        $job->vacancy = $request->vacancy;
        $job->job_responsibility = $request->job_responsibility;
        $job->employment_status = $request->employment_status;
        $job->education_requirement = $request->education_requirement;
        $job->job_context = $request->job_context;
        $job->experience_requirement = $request->experience_requirement;
        $job->additional_requirement = $request->additional_requirement;
        $job->job_location = $request->job_location;
        $job->salary = $request->salary;
        $job->other_benefits = $request->other_benefits;
        $job->slug = Str::slug($request->title, "-");
        $job->jcategory_id = $request->jcategory_id;
        $job->email = $request->email;
        $job->deadline = $request->deadline;
        $job->meta_tags = $request->meta_tags;
        $job->meta_description = $request->meta_description;

        $job->update();


        $notification = array(
            'messege' => 'Job Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.job').'?language='.$this->lang->code)->with('notification', $notification);
    }
}
