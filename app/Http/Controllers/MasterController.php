<?php

namespace App\Http\Controllers;

use App\Models\Master;
use App\Models\MasterTest;
use Illuminate\Http\Request;
use App\Models\Paket;
use Illuminate\Support\Facades\DB;
use DataTables;

class MasterController extends Controller
{
    //index
    public function index()
    {
        return view('master.index');
    }

    //get datatable
    public function list(Request $request)
    {
        // dd($request)
        if ($request->ajax()) {
            $data = Master::with('masterTest')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    return ($row->status == true) ? 'Aktif' : 'Tidak Aktif';
                })
                ->addColumn('master_test', function ($row) {
                    return !empty($row->masterTest->nama) ? $row->masterTest->nama : '-';
                })
                ->addColumn('paket', function ($row) {
                    return !empty($row->masterTest->paket->nama) ? $row->masterTest->paket->nama : '-';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('master.detail', array('id' => $row->id)) . '" data-toggle="tooltip"  class="edit btn btn-primary btn-sm ">Detail</a>';
                    $btn = $btn . ' <a href="' . route('master.edit', $row->id) . '" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-warning btn-sm deletePost">Edit</a>';
                    $btn = $btn . ' <a href="' . route('master.hapus', $row->id) . '" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['status', 'paket', 'master_test', 'action'])
                ->make(true);
        }
    }

    //index
    public function add()
    {
        return view('master.add');
    }

    //store
    public function store(Request $request)
    {
        $model = new Master();
        $model->nama = $request->nama;
        $model->master_test_id = $request->master_test_id;
        $model->status = ($request->status == true) ? true : false;

        $model->save();
        return redirect()->route('master.index')->with('success', 'Master created successfully');
    }

    //update
    public function update($id, Request $request)
    {
        // dd($request->status);
        $model = Master::find($id);
        $model->nama = $request->nama;
        $model->master_test_id = $request->master_test_id;

        $model->status = ($request->status == true) ? true : false;

        $model->save();
        return redirect()->route('master.index')->with('success', 'Master updated successfully');
    }

    //detail
    public function detail($id)
    {
        $model = Master::find($id);
        return view('master.detail', compact('model'));
    }


    //edit
    public function edit($id)
    {
        $model = Master::find($id);
        return view('master.edit', compact('model'));
    }

    //hapus
    public function hapus($id)
    {
        $model = Master::find($id)->delete();
        return redirect()->route('master.index')->with('success', 'Master deleted successfully');
    }

    //get list paket
    public function getMasterTest(Request $request)
    {
        $search = $request->term;
        $data = MasterTest::selectRaw('CONCAT(master_test.nama, " - ", paket.nama) as text, master_test.id as id')
            ->join('paket', 'paket.id', '=', 'master_test.paket_id')
            ->where('master_test.nama', 'LIKE', "%$search%")
            ->where('master_test.status', '=', true)
            ->get();

        return response()->json($data);
    }
}
