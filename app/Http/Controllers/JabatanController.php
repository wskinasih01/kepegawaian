<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JabatanModel;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:jabatan-list', ['only' => ['index']]);
        $this->middleware('permission:jabatan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:jabatan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:jabatan-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $jabatan = JabatanModel::orderBy('nama_jabatan', 'ASC')->get();

        return view('admin.master.jabatan.index', compact('jabatan'));
    }
    public function create()
    {
        return view('admin.master.jabatan.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_jabatan' => 'required|string|max:255',
        ]);
        if ($validator->passes()) {
            JabatanModel::create($request->all());
            return redirect()->route('admin.master.jabatan.index')->with('success', 'Data Jabatan created successfully');
        } else {
            return redirect()->route('jabatan.create')->withInput()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $jabatan = JabatanModel::findOrFail($id);

        return view('admin.master.jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, $id)
    {
        $jabatan = JabatanModel::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nama_jabatan' => 'required|string|max:255',
        ]);
        if ($validator->passes()) {
            $jabatan->update($request->all());
            return redirect()->route('admin.master.jabatan.index')->with('success', 'Data Jabatan updated successfully');
        } else {
            return redirect()->route('jabatan.edit', $id)->withInput()->withErrors($validator);
        }
    }

    public function destroy($id)
    {
        $jabatan = JabatanModel::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('admin.master.jabatan.index')->with('success', 'Data Jabatan deleted successfully');
    }
}



