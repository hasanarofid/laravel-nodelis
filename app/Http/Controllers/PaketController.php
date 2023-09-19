<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use Illuminate\Support\Facades\DB;
use DataTables;

class PaketController extends Controller
{
    //index
    public function index()
    {
        return view('paket.index');
    }

    //get datatable
    public function list(Request $request)
    {
        // dd($request)
        if ($request->ajax()) {
            $data = Paket::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    return ($row->status == true) ? 'Aktif' : 'Tidak Aktif';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('paket.detail', array('id' => $row->id)) . '" data-toggle="tooltip"  class="edit btn btn-primary btn-sm ">Detail</a>';
                    $btn = $btn . ' <a href="' . route('paket.edit', $row->id) . '" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-warning btn-sm deletePost">Edit</a>';
                    $btn = $btn . ' <a href="' . route('paket.hapus', $row->id) . '" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    //index
    public function add()
    {
        return view('paket.add');
    }

    //store
    public function store(Request $request)
    {
        $model = new Paket();
        $model->nama = $request->nama;
        $model->status = ($request->status == true) ? true : false;

        $model->save();
        return redirect()->route('paket.index')->with('success', 'Paket created successfully');
    }

    //update
    public function update($id, Request $request)
    {
        // dd($request->status);
        $model = Paket::find($id);
        $model->nama = $request->nama;
        $model->status = ($request->status == true) ? true : false;

        $model->save();
        return redirect()->route('paket.index')->with('success', 'Paket updated successfully');
    }

    //detail
    public function detail($id)
    {
        $model = Paket::find($id);
        return view('paket.detail', compact('model'));
    }


    //edit
    public function edit($id)
    {
        $model = Paket::find($id);
        return view('paket.edit', compact('model'));
    }

    //hapus
    public function hapus($id)
    {
        $model = Paket::find($id)->delete();
        return redirect()->route('paket.index')->with('success', 'Paket deleted successfully');
    }
}
