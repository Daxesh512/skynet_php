<?php

namespace App\Http\Controllers\Admin;

use App\Models\Archive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArchiveController extends Controller
{
    public function index() {
        $archives = Archive::orderBy('id', 'DESC')->get();
        return view('admin.blog.archive.index', compact('archives'));
    }

    public function add() {
        return view('admin.blog.archive.add');
    }

    public function store(Request $request) {
        $request->validate([
            'date' => 'required',
        ]);

        $archive = new Archive();
        $archive->date = $request->date;
        $archive->save();

        
        $notification = array(
            'messege' => 'Archive Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function edit($id) {
        $archive = Archive::findOrFail($id);
        return view('admin.blog.archive.edit', compact('archive'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'date' => 'required',
        ]);

        $archive = Archive::findOrFail($id);
        $archive->date = $request->date;
        $archive->save();

        $notification = array(
            'messege' => 'Archive Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.archive'))->with('notification', $notification);
    }

    public function delete($id){
       
        $archive = Archive::findOrFail($id);
        $archive->delete();

        $notification = array(
            'messege' => 'Archive Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

}
