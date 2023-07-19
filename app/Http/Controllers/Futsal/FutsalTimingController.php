<?php

namespace App\Http\Controllers\Futsal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Timing;
use App\Models\Futsal_timing;

class FutsalTimingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timings = Futsal_timing::latest()
            ->where('user_id', auth()->user()->id)
            ->with(['timing', 'futsal'])
            ->paginate(10);

        return view('futsal.timings.index', compact('timings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $timings = Timing::latest()
            ->whereNotIn('id', auth()->user()->futsal_timings->pluck('timing_id')->toArray())
            ->get();

        return view("futsal.timings.create", compact('timings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'timings'    => 'bail|required|array',
            'timings.*'  => 'exists:timings,id' // for every id in an array
                            // Check if the id exits in timings
        ]);


        $futsal_timings = auth()
                            ->user()
                            ->futsal_timings
                            ->pluck('timing_id')
                            ->toArray();

        foreach($validated['timings'] as $timing){

            if(in_array($timing, $futsal_timings)) {

                continue;

            }

            auth()->user()->futsal_timings()->create([
                'timing_id'        => $timing,
                'transaction_id'   => str()->uuid()
            ]);

        }

        return redirect()->route('futsal.timings.index')->with(['success', 'Timing Added.']);
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
        
        $futsal_timing = Futsal_timing::findOrfail($id)->delete();

        return redirect()->route('futsal.timings.index')->with(['success' => 'Timing Deleted.']);

    }
}
