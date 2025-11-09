<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Language;

class HelperController extends Controller
{
    public function getcategory(Request $request)
    {
        $table = $request->table;
        $language = $request->language;
        $data = DB::table($table)->where('status',1)->where('language_id',$language)->get();
        return response()->json($data);
    }


    
}
