<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct() {
        //Permission Check
    }
    public function index()
    {
        
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return view('pages.dashboards.index');
    
    }
}
