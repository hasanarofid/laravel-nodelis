<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use DataTables;

class DokterController extends Controller
{
     //index
    public function index(){
        return view('dokter.index');     
    }

    //get datatable
    public function list(Request $request){
        // dd($request)
         if ($request->ajax()) {
             $data = Doctor::get();
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
                           $btn = '<a href="'.route('dokter.detail',array('id'=>$row->id)).'" data-toggle="tooltip"  class="edit btn btn-primary btn-sm ">Detail</a>';
                           $btn = $btn.' <a href="'.route('dokter.edit',$row->id).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-warning btn-sm deletePost">Edit</a>';
                           $btn = $btn.' <a href="'.route('dokter.hapus',$row->id).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    
    }

     //index
    public function add(){
        return view('dokter.add');     
    }

    //store
    public function store(Request $request){
        // dd($request->name);
        $model = new Doctor();
        $model->name = $request->name;
        $model->nik = $request->nik;
        $model->sex = $request->jenis;
        $model->address = $request->address;
        $model->specialist = $request->specialist;

        $model->save();
         return redirect()->route('dokter.index')->with('success', 'Dokter created successfully');
    }

    //update
    public function update($id,Request $request){
        // dd($request->name);
         $model= Doctor::find($id);
        $model->name = $request->name;
        $model->nik = $request->nik;
        $model->sex = $request->jenis;
        $model->address = $request->address;
        $model->specialist = $request->specialist;
        $model->save();
         return redirect()->route('dokter.index')->with('success', 'Dokter updated successfully');
    }

    //detail
    public function detail($id){
        $model= Doctor::find($id);
        return view('dokter.detail',compact('model'));     
    }


    //edit
    public function edit($id){
        $model= Doctor::find($id);
        return view('dokter.edit',compact('model'));     
    }

      //hapus
    public function hapus($id){
        $model= Doctor::find($id)->delete();
      return redirect()->route('dokter.index')->with('success', 'Dokter deleted successfully');
    }

}
