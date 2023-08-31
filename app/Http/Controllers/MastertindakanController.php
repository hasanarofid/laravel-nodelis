<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterTindakan;
use Illuminate\Support\Facades\DB;
use DataTables;
class MastertindakanController extends Controller
{
    //index
    public function index(){
        return view('mastertindakan.index');     
    }
 
    //get datatable
    public function list(Request $request){
        // dd($request)
         if ($request->ajax()) {
             $data = MasterTindakan::get();
         
            return Datatables::of($data)
                    ->addIndexColumn()
                  
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('mastertindakan.detail',array('id'=>$row->id)).'" data-toggle="tooltip"  class="edit btn btn-primary btn-sm ">Detail</a>';
                           $btn = $btn.' <a href="'.route('mastertindakan.edit',$row->id).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-warning btn-sm deletePost">Edit</a>';
                           $btn = $btn.' <a href="'.route('mastertindakan.hapus',$row->id).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    
    }

     //index
    public function add(){
        return view('mastertindakan.add');     
    }

    //store
    public function store(Request $request){
        // dd($request->name);
        $model = new MasterTindakan();
        $model->name = $request->name;
        $model->stok = $request->stok;
        $model->save();
         return redirect()->route('mastertindakan.index')->with('success', 'master tindakan created successfully');
    }

    //update
    public function update($id,Request $request){
        // dd($request->name);
         $model= MasterTindakan::find($id);
       $model->name = $request->name;
        $model->stok = $request->stok;
        $model->save();
         return redirect()->route('mastertindakan.index')->with('success', 'master tindakan updated successfully');
    }

    //detail
    public function detail($id){
        $model= MasterTindakan::find($id);
        return view('mastertindakan.detail',compact('model'));     
    }


    //edit
    public function edit($id){
        $model= MasterTindakan::find($id);
        return view('mastertindakan.edit',compact('model'));     
    }

      //hapus
    public function hapus($id){
        $model= MasterTindakan::find($id)->delete();
      return redirect()->route('mastertindakan.index')->with('success', 'master tindakan deleted successfully');
    }
}
