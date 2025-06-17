<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user() ?? User::firstOrFail(); 
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

        $emptyFields = [];
        if (empty($request->name)) $emptyFields[] = 'Name';
        if (empty($request->email)) $emptyFields[] = 'Email';
        if (empty($request->role)) $emptyFields[] = 'Role';
        if (empty($request->informasi)) $emptyFields[] = 'Informasi';
        if (empty($request->hp)) $emptyFields[] = 'HP';

        if (!empty($emptyFields)) {
            return redirect()->back()->with('error', 'Field berikut harus diisi: ' . implode(', ', $emptyFields));
        }

        // Tambahan: Jika new_password diisi, retype_password wajib diisi
        if ($request->filled('new_password') && !$request->filled('retype_password')) {
            return redirect()->back()->with('error', 'Retype password harus diisi');
        }

        if ($request->filled('new_password') || $request->filled('retype_password')) {
            if ($request->new_password !== $request->retype_password) {
                return redirect()->back()->with('error', 'Password baru tidak cocok');
            }
            if (!Hash::check($request->password, $user->password)) {
                return redirect()->back()->with('error', 'Password lama salah');
            }
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'informasi' => 'nullable|string',
            'hp' => 'nullable|string|max:15',
            'role' => 'required|in:admin,customer,ceo/co-founder',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Nama tidak boleh kosong.',
            'email.required' => 'Email tidak boleh kosong.',
            'role.required' => 'Role tidak boleh kosong.',
        ]);

        if ($request->hasFile('foto')) {
            if ($user->foto && file_exists(public_path('storage/' . $user->foto))) {
                unlink(public_path('storage/' . $user->foto));
            }
            $imagePath = $request->file('foto')->store('foto', 'public');
            $data['foto'] = $imagePath;
        }

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->informasi = $data['informasi'];
        $user->hp = $data['hp'];
        $user->role = $data['role'];
        if (isset($data['foto'])) {
            $user->foto = $data['foto'];
        }
        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Your account has been successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}