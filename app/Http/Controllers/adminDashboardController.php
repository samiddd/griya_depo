<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontraktor;
use App\Models\Mitra;
use App\Models\Perbaikan;
use App\Models\Pembangunan;

class adminDashboardController extends Controller
{
    public function index(){

        $data = [
            'Kontraktor' => Kontraktor::count(),
            'Mitra' => Mitra::count(),
            'Perbaikan' => Perbaikan::count(),
            'Pembangunan' => Pembangunan::count(),
        ];
        return view('admin.dashboard.index', $data);
    }
}
