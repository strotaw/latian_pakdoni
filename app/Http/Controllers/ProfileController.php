<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user() ?? User::firstOrFail(); // Ambil pengguna login atau pengguna pertama
        return view('profile.index', [
            'title' => 'profile',
            'user' => $user,
        ]);
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
        $user = User::findOrFail($id);
        return view('profile.index', [
            'title' => 'edit profile',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'informasi' => 'nullable|string',
            'hp' => 'nullable|string|max:15',
            'role' => 'required|in:admin,customer,ceo/co-founder',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle profile picture upload
        if ($request->hasFile('foto')) {
            // Delete old picture if exists
            if ($user->foto && file_exists(public_path('storage/' . $user->foto))) {
                unlink(public_path('storage/' . $user->foto));
            }
            $imagePath = $request->file('foto')->store('foto', 'public');
            $data['foto'] = $imagePath;
        }

        // Update user data
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->informasi = $data['informasi'];
        $user->hp = $data['hp'];
        $user->role = $data['role'];
        if (isset($data['foto'])) {
            $user->foto = $data['foto'];
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
