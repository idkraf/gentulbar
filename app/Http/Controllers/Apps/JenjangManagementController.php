<?php

namespace App\Http\Controllers\Apps;

use App\DataTables\JenjangDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JenjangManagementController extends Controller
{
    public function __construct() {
        $this->middleware(['permission:read jenjang'])->only('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(JenjangDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.generus-management.jenjang.list');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
