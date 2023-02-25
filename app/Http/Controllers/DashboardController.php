<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Get the dashboard data for the given requesting user
     */
    public function index(Request $request): \Inertia\Response
    {
        return Inertia::render('Dashboard', [
            'shipments' => Shipment::where('user_id', $request->user()->id)
                ->orderBy('expected')
                ->get(),
        ]);
    }
}
