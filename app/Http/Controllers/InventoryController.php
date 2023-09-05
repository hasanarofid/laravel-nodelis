<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterTindakan;
use App\Models\Inventory;

use Illuminate\Support\Facades\DB;
use DataTables;

class InventoryController extends Controller
{
    //index
    public function index(){
        return view('inventory.index');     
    }
 
    //get datatable
    public function list(Request $request){
        // dd($request)
         if ($request->ajax()) {
             $data = Inventory::get();
         
            return Datatables::of($data)
                    ->addIndexColumn()
                      ->addColumn('sub', function($row){
                        if(!empty($row->tindakan_id)){
                            return MasterTindakan::find($row->tindakan_id)->name;
                        }else{
                            return '-';
                        }
                    })
                  
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('inventory.detail',array('id'=>$row->id)).'" data-toggle="tooltip"  class="edit btn btn-primary btn-sm ">Detail</a>';
                           $btn = $btn.' <a href="'.route('inventory.edit',$row->id).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-warning btn-sm deletePost">Edit</a>';
                           $btn = $btn.' <a href="'.route('inventory.hapus',$row->id).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['sub','action'])
                    ->make(true);
        }
    
    }

     //index
    public function add(){
        return view('inventory.addnew');     
    }

    //store
    public function store(Request $request){
        // dd($request->name);
        $model = new Inventory();
        $model->name = $request->name;
        $model->stok = $request->stok;
        $model->tindakan_id = !empty($request->tindakan_id) ?$request->tindakan_id : null;
        $model->save();
         return redirect()->route('inventory.index')->with('success', 'master tindakan created successfully');
    }

    //update
    public function update($id,Request $request){
        // dd($request->name);
         $model= Inventory::find($id);
       $model->name = $request->name;
        $model->stok = $request->stok;
        $model->tindakan_id = !empty($request->tindakan_id) ?$request->tindakan_id : null;
        
        $model->save();
         return redirect()->route('inventory.index')->with('success', 'master tindakan updated successfully');
    }

    //detail
    public function detail($id){
        $model= Inventory::find($id);
        return view('inventory.detail',compact('model'));     
    }


    //edit
    public function edit($id){
        $model= Inventory::find($id);
        return view('inventory.edit',compact('model'));     
    }

      //hapus
    public function hapus($id){
        $model= MasterTindakan::find($id)->delete();
      return redirect()->route('inventory.index')->with('success', 'master tindakan deleted successfully');
    }

    public function getmaster(Request $request)
    {
        $search = $request->term;
        $data = MasterTindakan::select('name as text', 'id')
        ->where('name', 'LIKE', "%$search%")
        ->whereNull('id_master')
        ->get();
        
        return response()->json($data);
    }
}
