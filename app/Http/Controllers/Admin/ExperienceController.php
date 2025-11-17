<?php
// File: app/Http/Controllers/Admin/ExperienceController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('admin.experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'current' => 'boolean',
            'description' => 'required|string'
        ]);

        $data = $request->all();
        $data['is_public'] = true; // Set sebagai public

        Experience::create($data);

        // Clear cache portfolio
        Cache::forget('public_portfolio_data');

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Pengalaman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        return view('admin.experiences.show', compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'current' => 'boolean',
            'description' => 'required|string'
        ]);

        $data = $request->all();
        $data['is_public'] = true; // Set sebagai public

        $experience->update($data);

        // Clear cache portfolio
        Cache::forget('public_portfolio_data');

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Pengalaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();

        // Clear cache portfolio
        Cache::forget('public_portfolio_data');

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Pengalaman berhasil dihapus.');
    }
}