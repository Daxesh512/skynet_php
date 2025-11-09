<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sitemap;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Sitemap\SitemapGenerator;

class SitemapController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default', 1)->first();
    }

    public function index(Request $request)
    {
        $data['langs'] = Language::all();
        $data['sitemaps'] = Sitemap::orderBy('id', 'DESC')->paginate(10);
        return view('admin.settings.sitemap.sitemap', $data);
    }

    public function add()
    {
        return view('admin.settings.sitemap.add');
    }

    public function download(Request $request) {
        
        return response()->download('assets/sitemaps/'.$request->filename);
    }

    public function store(Request $request)
    {
        $data = new Sitemap();
        $input = $request->all();

        $filename = 'sitemap' . uniqid() . '.xml';
        SitemapGenerator::create($request->sitemap_url)->writeToFile('assets/sitemaps/' . $filename);
        $input['filename']    = $filename;
        $input['sitemap_url'] = $request->sitemap_url;
        $data->fill($input)->save();

        $notification = array(
            'messege' => 'Sitemap Generate Successfully',
            'alert' => 'success'
        );
        return redirect(route('admin.sitemap.index') . '?language=' . $this->lang->code)->with('notification', $notification);
    }

    public function delete($id)
    {

        $sitemap = Sitemap::find($id);
        @unlink('assets/sitemaps/' . $sitemap->filename);
        $sitemap->delete();

        $notification = array(
            'messege' => 'Sitemap file deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }
}
