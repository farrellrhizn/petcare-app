<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Pet;
use App\Models\Checkup;
use App\Models\Treatment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOwners = Owner::count();
        $totalPets = Pet::count();
        $totalCheckups = Checkup::count();
        $totalTreatments = Treatment::count();
        
        $recentPets = Pet::with('owner')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        $recentCheckups = Checkup::with(['pet', 'treatment'])
            ->orderBy('checkup_date', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalOwners',
            'totalPets',
            'totalCheckups',
            'totalTreatments',
            'recentPets',
            'recentCheckups'
        ));
    }
}
