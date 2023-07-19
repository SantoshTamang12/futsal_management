<?php

namespace App\Http\Controllers\Auth;

use App\Models\User as AuthUser;
use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class UpdateUserController extends Controller
{
    public function update($id)
    {
        AuthUser::findOrFail($id);
        return view('profileupdate');
    }

    public function updateprofile(Request $request, $id)
    {
        $user = AuthUser::findOrfail(auth()->user()->id);
        $user->name = $request->name;
        $user->dob = $request->dob;
        $user->email = $request->email;
        $user->location = $request->location;
        $user->phone = $request->phone;
        if ($request->hasFile("image")) {

            $user->clearMediaCollection();
            $user->addMediaFromRequest("image")->toMediaCollection();
        }
        $user->save();
        return redirect()->route('customer.dashboard')->with('message', 'Profile Updated Successfully..');
    }
}
