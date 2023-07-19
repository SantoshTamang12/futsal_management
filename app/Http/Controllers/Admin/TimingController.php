<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Futsal_timing;
use Illuminate\Http\Request;
use App\Models\Timing;
use DateTime;

class TimingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timings = Timing::latest()->paginate(10);

        return view('admin.timings.index', compact('timings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.timings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'price'   => 'required|numeric',
            'from'    => 'required',
            'to'      => 'required',
        ]);


        $from = (new DateTime($request->from))->format("H:i:s");
        $to   = (new DateTime($request->to))->format("H:i:s");

        $alreadyAdded = Timing::where('from', $from)
            ->orWhere('to', $to)
            ->first();
        if ($alreadyAdded) {

            return back()
                ->withInput($request->input())
                ->with(['error' => 'The time has already been added.']);
        }


        if ((new DateTime($request->to))->format("H:i:s") <= ((new DateTime($request->from))->format("H:i:s"))) {

            return back()
                ->withInput($request->input())
                ->with(['error' => 'To Time must be greater than from time.']);
        }

        $validated['from'] = $from;
        $validated['to'] = $to;
        Timing::create($validated);

        return redirect()->route('admin.timings.index')->with(['success' => 'Timing added.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $timing = Timing::findOrfail($id);

        return view('admin.timings.show', compact('timing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $timing = Timing::findOrfail($id);

        return view('admin.timings.edit', compact('timing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'price'   => 'required|numeric',
            'from'    => 'required|date_format:H:i:s',
            'to'      => 'required|date_format:H:i:s',
        ]);

        $timing = Timing::findOrfail($id);

        $timing->update($validated);

        return redirect()->route('admin.timings.index')->with(['success' => 'Timing updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $timing = Timing::findOrfail($id);
        Futsal_timing::where('timing_id', $id)->delete();
        $timing->delete();

        return redirect()->route('admin.timings.index')->with(['success' => 'Timing deleted.']);
    }
}
