<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendidikanModel;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Routing\Controllers\HasMiddleware;
// use Illuminate\Routing\Controllers\Middleware;

class PendidikanController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:pendidikan-list', ['only' => ['index']]);
        $this->middleware('permission:pendidikan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pendidikan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pendidikan-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $pendidikan = PendidikanModel::orderBy('id', 'DESC')->get();

        return view('admin.master.pendidikan.index', compact('pendidikan'));
    }
    public function create()
    {
        return view('admin.master.pendidikan.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pendidikan' => 'required|string|max:255',
        ]);

        if ($validator->passes()) {
            PendidikanModel::create(['pendidikan' => $request->pendidikan]);
            return redirect()->route('admin.master.pendidikan.index')->with('success', 'Data Pendidikan created successfully');
        } else {
            return redirect()->route('pendidikan.create')->withInput()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $pendidikan = PendidikanModel::findOrFail($id);

        return view('admin.master.pendidikan.edit', compact('pendidikan'));
    }

    public function update(Request $request, $id)
    {
        $pendidikan = PendidikanModel::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'pendidikan' => 'required|string|max:255',
        ]);

        if ($validator->passes()) {
            $pendidikan->update($request->all());
            return redirect()->route('admin.master.pendidikan.index')->with('success', 'Data Pendidikan updated successfully');
        } else {
            return redirect()->route('pendidikan.edit', $id)->withInput()->withErrors($validator);
        }
    }

    public function destroy($id)
    {
        $pendidikan = PendidikanModel::findOrFail($id);
        $pendidikan->delete();

        return redirect()->route('admin.master.pendidikan.index')->with('success', 'Data Pendidikan deleted successfully');
    }
}
