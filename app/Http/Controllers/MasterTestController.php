<?php

namespace App\Http\Controllers;

use App\Models\MasterTest;
use Illuminate\Http\Request;
use App\Models\Paket;
use Illuminate\Support\Facades\DB;
use DataTables;

class MasterTestController extends Controller
{
    //index
    public function index()
    {
        return view('masterTest.index');
    }

    //get datatable
    public function list(Request $request)
    {
        // dd($request)
        if ($request->ajax()) {
            $data = MasterTest::with('paket')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    return ($row->status == true) ? 'Aktif' : 'Tidak Aktif';
                })
                ->addColumn('paket', function ($row) {
                    return !empty($row->paket->nama) ? $row->paket->nama : '-';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('master-test.detail', array('id' => $row->id)) . '" data-toggle="tooltip"  class="edit btn btn-primary btn-sm ">Detail</a>';
                    $btn = $btn . ' <a href="' . route('master-test.edit', $row->id) . '" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-warning btn-sm deletePost">Edit</a>';
                    $btn = $btn . ' <a href="' . route('master-test.hapus', $row->id) . '" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['status', 'paket', 'action'])
                ->make(true);
        }
    }

    //index
    public function add()
    {
        return view('masterTest.add');
    }

    //store
    public function store(Request $request)
    {
        $model = new MasterTest();
        $model->nama = $request->nama;
        $model->paket_id = $request->paket_id;
        $model->status = ($request->status == true) ? true : false;

        $model->save();
        return redirect()->route('master-test.index')->with('success', 'Master Test created successfully');
    }

    //update
    public function update($id, Request $request)
    {
        // dd($request->status);
        $model = MasterTest::find($id);
        $model->nama = $request->nama;
        $model->paket_id = $request->paket_id;

        $model->status = ($request->status == true) ? true : false;

        $model->save();
        return redirect()->route('master-test.index')->with('success', 'Master Test updated successfully');
    }

    //detail
    public function detail($id)
    {
        $model = MasterTest::find($id);
        return view('masterTest.detail', compact('model'));
    }


    //edit
    public function edit($id)
    {
        $model = MasterTest::find($id);
        return view('masterTest.edit', compact('model'));
    }

    //hapus
    public function hapus($id)
    {
        $model = MasterTest::find($id)->delete();
        return redirect()->route('master-test.index')->with('success', 'Master Test deleted successfully');
    }

    //get list paket
    public function getPaket(Request $request)
    {
        $search = $request->term;
        $data = Paket::select('nama as text', 'id')
            ->where('nama', 'LIKE', "%$search%")
            ->where('status', '=', true)
            ->get();

        return response()->json($data);
    }
}
