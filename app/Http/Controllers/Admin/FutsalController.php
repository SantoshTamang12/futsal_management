<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class FutsalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $futsals = User::where('role' , 'Futsal')->paginate(10);

        return view('admin.futsals.index', compact('futsals'));
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
    public function show($id)
    {
        $futsal = User::findOrfail($id);

        return view('admin.futsals.show', compact('futsal'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(U$id)
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
    public function destroy($id)
    {

        $futsal = User::findOrfail($id);

        if($futsal->role != 'Futsal')
        {

            return redirect()->route('admin.futsals.index')->with(['error' => '404 not found.']);

        }

        $futsal->delete();

        return redirect()->route('admin.futsals.index')->with(['success' => 'Futsal Deleted.']);
    }
}
