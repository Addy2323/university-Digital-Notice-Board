<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $recentNotices = Notice::latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('recentNotices'));
    }
} 