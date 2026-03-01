<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private array $menuMap = [
        ''           => 'dashboard',
        'dashboard'  => 'dashboard',
        'users'      => 'users',
        'categories' => 'categories',
        'reports'    => 'reports',
        'roles'      => 'roles',
        'settings'   => 'settings',
    ];

    public function index(Request $request)
    {
        $activeMenu = $this->resolveActiveMenu($request);
        return view('admin.layouts.dashboard.index', compact('activeMenu'));
    }

    private function resolveActiveMenu(Request $request): string
    {
        $segment = $request->segment(1) ?? '';
        return $this->menuMap[$segment] ?? $segment;
    }
}
