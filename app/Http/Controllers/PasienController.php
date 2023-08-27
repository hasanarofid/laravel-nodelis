<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use DataTables;

class PasienController extends Controller
{
    //index
    public function index(){
        return view('pasien.index');     
    }

    //get datatable
    public function list(Request $request){
        // dd($request)
         if ($request->ajax()) {
             $data = Patient::get();
            // $post = Testdata::select('PATIENT_ID_OPT', DB::raw('SUM(amount) as total_amount'))
            //  ->groupBy('patient_id')
            // ->get();
            // dd($post);
            return Datatables::of($data)
                    ->addIndexColumn()
                    // number_format((int)$model->harga)
                    //  ->addColumn('harga', function($row){
                    //     return number_format((int)$row->harga);
                    //  })->addColumn('foto', function($row){
                    //         $foto =  asset('/storage/'.$row->foto);
                   
                    //  return  ' <div class="card card-profile"><img src="'.$foto.'" height="100px" alt="Image placeholder" class="card-img-top"></div>';
                    // })
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('pasien.detail',array('id'=>$row->id)).'" data-toggle="tooltip"  class="edit btn btn-primary btn-sm ">Detail</a>';
                           $btn = $btn.' <a href="'.route('pasien.edit',$row->id).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-warning btn-sm deletePost">Edit</a>';
                           $btn = $btn.' <a href="'.route('pasien.hapus',$row->id).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    
    }

     //index
    public function add(){
        return view('pasien.add');     
    }

    //store
    public function store(Request $request){
        // dd($request->name);
        $model = new Patient();
        $model->name = $request->name;
        $model->nik = $request->nik;
        $model->sex = $request->jenis;
        $model->address = $request->address;
        $model->save();
         return redirect()->route('pasien.index')->with('success', 'Pasien created successfully');
    }

    //update
    public function update($id,Request $request){
        // dd($request->name);
         $model= Patient::find($id);
        $model->name = $request->name;
        $model->nik = $request->nik;
        $model->sex = $request->jenis;
        $model->address = $request->address;
        $model->save();
         return redirect()->route('pasien.index')->with('success', 'Pasien updated successfully');
    }

    //detail
    public function detail($id){
        $model= Patient::find($id);
        return view('pasien.detail',compact('model'));     
    }


    //edit
    public function edit($id){
        $model= Patient::find($id);
        return view('pasien.edit',compact('model'));     
    }

      //hapus
    public function hapus($id){
        $model= Patient::find($id)->delete();
      return redirect()->route('pasien.index')->with('success', 'Pasien deleted successfully');
    }

}
