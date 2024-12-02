<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:users-list', ['only' => ['index']]);
        $this->middleware('permission:users-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:users-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:users-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('admin.users.create', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|same:confirm_password|min:5',
            'confirm_password' => 'required',
           'profil' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.create')->withInput()->withErrors($validator);
        }

        $user = new User();

        $filePaths = [];
        $namaUser = str_replace(' ', '_', strtolower($request->name));
        if ($request->hasFile('profil')) {
            $filePaths['profil'] = $request->file('profil')
                ->storeAs('profile', $namaUser . '_Profil' . '.' . $request->file('profil')->getClientOriginalExtension(), 'public');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profil = $filePaths['profil'] ?? null;
        $user->save();

        $user->syncRoles($request->role);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::orderBy('name', 'ASC')->get();

        $hasRoles = $user->roles->pluck('id');
        // dd($hasRoles);
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $roles,
            'hasRoles' => $hasRoles
        ]);
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'nullable|min:5|same:confirm_password',
            'confirm_password' => 'nullable',
            'profil' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.edit', $id)->withInput()->withErrors($validator);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profil')) {
            $filePaths['profil'] = $request->file('profil')
                ->storeAs('profile', str_replace(' ', '_', strtolower($request->name)) . '_Profil' . '.' . $request->file('profil')->getClientOriginalExtension(), 'public');
            
            $user->profil = $filePaths['profil']; // Save the file path
        }
        $user->save();

        $user->syncRoles($request->role);
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
