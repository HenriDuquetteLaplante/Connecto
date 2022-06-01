<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SignalisationController extends Controller
{
    public function index()
    {
        $reports = DB::table('reports')
                        ->select('reports.id', 'reports.description', 'components.name', 'problems.type', 'reports.created_at')
                        ->leftjoin('problems', 'reports.problem_id', '=', 'problems.id')
                        ->join('components', 'component_id', '=', 'components.id')
                        ->orderBy('reports.id', 'desc')
                        ->where('reports.created_at', '>', now()->subDays(30)->endOfDay())
                        ->latest('reports.id')
                        ->get();

        return view('admin.signalisations.index', ['reports' => $reports]);
    }
}
