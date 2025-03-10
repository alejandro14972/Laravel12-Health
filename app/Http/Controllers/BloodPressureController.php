<?php

namespace App\Http\Controllers;

use App\Models\BloodPressure;
use Illuminate\Http\Request;

class BloodPressureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $bloodPressures = BloodPressure::where('user_id', $user)->get();
        return view('blood-pressures.index', compact('bloodPressures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blood-pressures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BloodPressure $bloodPressure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BloodPressure $bloodPressure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BloodPressure $bloodPressure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BloodPressure $bloodPressure)
    {
        //
    }
}
