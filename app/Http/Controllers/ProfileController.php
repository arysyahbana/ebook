<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $page = 'Profile';
        $user = Auth::user();

        if ($user->role == 'Admin') {
            return view('admin.pages.profile.index', compact('user', 'page'));
        } elseif ($user->role == 'Mahasiswa') {
            return view('user.pages.profile.index', compact('user', 'page'));
        }

        abort(403, 'Unauthorized access');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        if($data['password']){
            $data['password'] = Hash::make($data['password']);
        }
        else{
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->back()->with('success','Profile berhasil diupdate');
    }
}
