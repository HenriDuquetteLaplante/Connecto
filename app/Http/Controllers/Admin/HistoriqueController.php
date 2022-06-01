<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Incident;
use Illuminate\Support\Facades\DB;

class HistoriqueController extends Controller {
    public function index() {
        $components = Component::all();
        $incidents = Incident::with(['components', 'components.state', 'status'])->where('closed_date', '>', now()->subDays(30)->endOfDay())->orderBy('closed_date', 'desc')->take(5)->get();
        $reports = DB::table('reports')
                        ->select('reports.id', 'reports.description', 'components.name', 'problems.type', 'reports.created_at')
                        ->leftjoin('problems', 'reports.problem_id', '=', 'problems.id')
                        ->join('components', 'component_id', '=', 'components.id')
                        ->orderBy('reports.id', 'desc')
                        ->where('reports.created_at', '>', now()->subDays(30)->endOfDay())
                        ->take(5)
                        ->get();

        return view('admin.historique.index', ['components' => $components, 'incidents' => $incidents, 'reports' => $reports,]);
    }
} 