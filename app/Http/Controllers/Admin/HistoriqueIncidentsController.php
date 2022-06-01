<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use App\Models\Component;

class HistoriqueIncidentsController extends Controller {
    public function index() {
        $components = Component::all();
        $incidents = Incident::with(['components', 'components.state', 'status'])->where('closed_date', '>', now()->subDays(30)->endOfDay())->orderBy('closed_date', 'desc')->get();

        return view('admin.histIncidents.index', ['components' => $components, 'incidents' => $incidents]);
    }
} 