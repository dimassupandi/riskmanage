<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Mitigation;
use App\Models\Risk;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $lowCount = Risk::where('level', 'low')->count();
        $mediumCount = Risk::where('level', 'medium')->count();
        $highCount = Risk::where('level', 'high')->count();
        return view('dashboard', [
            'lowCount' => $lowCount,
            'mediumCount' => $mediumCount,
            'highCount' => $highCount,
            'user' => User::count(),
            'asset' => Asset::count(),
            'risk' => Risk::count(),
            'mitigation' => Mitigation::count(),
        ]);
    }
}
