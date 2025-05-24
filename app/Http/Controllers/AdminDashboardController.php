<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'total_notices' => Notice::count(),
            'active_notices' => Notice::where('status', 'active')->count(),
            'total_users' => User::count(),
            'recent_notices' => Notice::with('user')
                ->latest()
                ->take(5)
                ->get(),
            'notices_by_department' => Notice::select('department', DB::raw('count(*) as total'))
                ->groupBy('department')
                ->get(),
        ];

        $adminName = Auth::user()->name;
        $userCount = User::count();

        return view('admin.dashboard', compact('stats', 'adminName', 'userCount'));
    }

    /**
     * Display the user management page.
     */
    public function users()
    {
        $users = User::withCount('notices')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the notice management page.
     */
    public function notices()
    {
        $notices = Notice::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.notices.index', compact('notices'));
    }

    /**
     * Display the department statistics.
     */
    public function departments()
    {
        $departmentStats = Notice::select('department', DB::raw('count(*) as total'))
            ->groupBy('department')
            ->orderBy('total', 'desc')
            ->get();

        return view('admin.departments.index', compact('departmentStats'));
    }
} 