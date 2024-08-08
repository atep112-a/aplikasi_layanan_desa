<?php
namespace App\Http\Controllers;

use App\Models\Sktm;
use App\Models\User;
use App\Models\Sppt;
use App\Models\Kelahiran;
use App\Models\Kematian;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function index() : View
    {
        // Fetch data from each table with their related user
        $sktms = Sktm::with('user')->latest()->get();
        $sppts = Sppt::with('user')->latest()->get();
        $kelahirans = Kelahiran::with('user')->latest()->get();
        $kematians = Kematian::with('user')->latest()->get();

        // Combine all data into a single collection
        $combinedData = collect()
            ->merge($sktms->map(function($item) { return ['type' => 'SKTM', 'data' => $item]; }))
            ->merge($sppts->map(function($item) { return ['type' => 'SPPT', 'data' => $item]; }))
            ->merge($kelahirans->map(function($item) { return ['type' => 'Kelahiran', 'data' => $item]; }))
            ->merge($kematians->map(function($item) { return ['type' => 'Kematian', 'data' => $item]; }));

        // Pass the combined data to the view
        return view('dashboard.index', compact('combinedData'));
    }
}
