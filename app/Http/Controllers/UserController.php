<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST USER
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if (auth()->user()->role == 'superadmin') {

            $users = User::with('fakultas')
                ->latest()
                ->get();

        } else {

            $users = User::with('fakultas')
                ->where(
                    'fakultas_id',
                    auth()->user()->fakultas_id
                )
                ->latest()
                ->get();

        }

        return view('admin.users.index', compact('users'));
    }

    /*
    |--------------------------------------------------------------------------
    | FORM CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        if (auth()->user()->role == 'superadmin') {

            $fakultas = Fakultas::all();

        } else {

            $fakultas = Fakultas::where(
                'id',
                auth()->user()->fakultas_id
            )->get();

        }

        return view('admin.users.create', compact('fakultas'));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'nim' => 'required',
            'prodi' => 'required',
            'role' => 'required',
            'fakultas_id' => 'required'
        ]);

        if (
            auth()->user()->role != 'superadmin' &&
            $request->fakultas_id != auth()->user()->fakultas_id
        ) {
            abort(403);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'role' => $request->role,
            'fakultas_id' => $request->fakultas_id,

            'email_verified_at' => null
        ]);

        event(new Registered($user));

        return redirect()
            ->route('users.index')
            ->with('success', 'Akun berhasil ditambahkan');
    }

    /*
    |--------------------------------------------------------------------------
    | FORM EDIT
    |--------------------------------------------------------------------------
    */
    public function edit(User $user)
    {
        if (
            auth()->user()->role != 'superadmin' &&
            $user->fakultas_id != auth()->user()->fakultas_id
        ) {
            abort(403);
        }

        if (auth()->user()->role == 'superadmin') {

            $fakultas = Fakultas::all();

        } else {

            $fakultas = Fakultas::where(
                'id',
                auth()->user()->fakultas_id
            )->get();

        }

        return view(
            'admin.users.edit',
            compact('user', 'fakultas')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, User $user)
    {
        if (
            auth()->user()->role != 'superadmin' &&
            $user->fakultas_id != auth()->user()->fakultas_id
        ) {
            abort(403);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'nim' => 'required',
            'prodi' => 'required',
            'role' => 'required',
            'fakultas_id' => 'required'
        ]);

        if (
            auth()->user()->role != 'superadmin' &&
            $request->fakultas_id != auth()->user()->fakultas_id
        ) {
            abort(403);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'role' => $request->role,
            'fakultas_id' => $request->fakultas_id
        ];

        if (!empty($request->password)) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with('success', 'Akun berhasil diupdate');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy(User $user)
    {
        if (
            auth()->user()->role != 'superadmin' &&
            $user->fakultas_id != auth()->user()->fakultas_id
        ) {
            abort(403);
        }

        if (
            $user->id == auth()->id()
        ) {
            return back()->with(
                'error',
                'Tidak dapat menghapus akun sendiri'
            );
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'Akun berhasil dihapus');
    }
}