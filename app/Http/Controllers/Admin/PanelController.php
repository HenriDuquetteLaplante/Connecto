<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Component;
use App\Models\State;

class PanelController extends Controller
{
    public function index() {

        $components = Component::all();

        $states = State::all();
                           
        $reports = Report::with('component', 'problem')->orderBy('id', 'DESC')->take(5)->get();

        $reportCounts =
        Component::withCount(['reports' => function ($q) {$q->where('created_at', '>', now()->subDays(30)->endOfDay());}])->orderBy('reports_count', 'desc')->take(5)->get();
            
        return view('admin.panel.index',['components' => $components, 'reports' => $reports, 'states' => $states, 'reportCounts' => $reportCounts,] );
    }
}

