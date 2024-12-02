<?php

namespace App\Http\Controllers;

use App\Models\UsiaPensiunModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsiaPensiunController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:usia-pensiun-list', ['only' => ['index']]);
        $this->middleware('permission:usia-pensiun-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:usia-pensiun-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:usia-pensiun-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $usias = UsiaPensiunModel::get();

        return view('admin.master.usia pensiun.index', compact('usias'));
    }
    public function create()
    {
        return view('admin.master.usia pensiun.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usia' => 'required',
        ]);
        if ($validator->passes()) {
            UsiaPensiunModel::create($request->all());
            return redirect()->route('admin.master.usia pensiun.index')->with('success', 'Data Usia Pensiun created successfully');
        } else {
            return redirect()->route('usia pensiun.create')->withInput()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $usias = UsiaPensiunModel::findOrFail($id);

        return view('admin.master.usia pensiun.edit', compact('usias'));
    }

    public function update(Request $request, $id)
    {
        $usias = UsiaPensiunModel::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'usia' => 'required',
        ]);
        if ($validator->passes()) {
            $usias->update($request->all());
            return redirect()->route('admin.master.usia pensiun.index')->with('success', 'Data Usia Pensiun updated successfully');
        } else {
            return redirect()->route('usia pensiun.edit', $id)->withInput()->withErrors($validator);
        }
    }

    public function destroy($id)
    {
        $usias = UsiaPensiunModel::findOrFail($id);
        $usias->delete();

        return redirect()->route('admin.master.usia pensiun.index')->with('success', 'Data Usia Pensiun deleted successfully');
    }
}
