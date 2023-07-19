<?php

namespace App\Http\Controllers\Futsal;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Media;

class CollectionController extends Controller
{
    public function gallery()
    {
        // AuthUser::findOrfail(auth()->user()->id);
        $user = User::findOrFail(auth()->user()->id);

        // dd($values);
        return view('Futsal.viewgallery', compact('user'));
    }

    public function store(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        if ($request->image) {
            // $user->clearMediaCollection('gallery');
            $user->addMediaFromRequest('image')->toMediaCollection('gallery');
        }

        return redirect()->route('futsal.gallery')->with('message', 'Image Upload successfully..');
    }


    public function delete($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();
        return redirect()->back()->with('success', 'Image has been Deleted.');
    }
}
