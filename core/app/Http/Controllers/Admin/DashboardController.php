<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quote;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $data['quotes'] = Quote::orderBy('id', 'DESC')->limit(10)->get();
        $data['portfolios'] = Portfolio::orderBy('id', 'DESC')->limit(10)->get();
        return view('admin.dashboard', $data);
    }
}
