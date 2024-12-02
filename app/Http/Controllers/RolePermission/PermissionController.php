<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permissions-list', ['only' => ['index']]);
        $this->middleware('permission:permissions-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permissions-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permissions-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $permissions = Permission::get();
        return view('admin.role permission.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.role permission.permissions.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3'
        ]);

        if ($validator->passes()) {
            Permission::create(['name' => $request->name]);
            return redirect()->route('admin.role permission.permissions.index')->with('success', 'Permissions created successfully');
        } else {
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.role permission.permissions.edit', [
            'permissions' => $permission
        ]);
    }

    public function update($id, Request $request)
    {
        $permission = Permission::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:permissions'
        ]);
        if ($validator->passes()) {
            $permission->name = $request->name;
            $permission->save();

            return redirect()->route('admin.role permission.permissions.index')->with('success', 'Permissions updated successfully');
        } else {
            return redirect()->route('permissions.edit', $id)->withInput()->withErrors($validator);
        }
    }

    public function destroy($id)
    {
        $permissions = Permission::findOrFail($id);
        $permissions->delete();

        return redirect()->route('admin.role permission.permissions.index')->with('success', 'Permissions deleted successfully');
    }
}
