<?php

namespace App\Http\Controllers\Apps;

use App\DataTables\GenerusDataTable;
use App\Http\Controllers\Controller;
use App\Models\Generus;
use Illuminate\Http\Request;

class GenerusManagementController extends Controller
{
    public function __construct() {
        //Permission Check
        $this->middleware(['permission:read generus'])->only('index');
        $this->middleware(['permission:create generus'])->only('create');
        $this->middleware(['permission:write generus'])->only('edit');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(GenerusDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.generus-management.generus.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Generus $generus)
    {
        return view('pages/apps.generus-management.generus.show', compact('generus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Generus $generus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Generus $dpt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Generus $dpt)
    {
        //
    }
    
}
