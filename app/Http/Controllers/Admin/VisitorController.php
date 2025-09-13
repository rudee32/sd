<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::latest()->paginate(20);
        $todayVisitors = Visitor::whereDate('visited_at', today())->count();
        $totalVisitors = Visitor::count();
        
        return view('admin.visitors.index', compact('visitors', 'todayVisitors', 'totalVisitors'));
    }
}