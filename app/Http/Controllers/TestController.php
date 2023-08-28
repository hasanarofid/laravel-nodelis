<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use App\Models\Doctor;
use DataTables;

class TestController extends Controller
{
    //index
    public function index(){
        return view('test.index');     
    }

     //get datatable
    public function list(Request $request){
        // dd($request)
         if ($request->ajax()) {
             $data = Test::select('PATIENT_ID_OPT','DEVICE_ID1','PATIENT_NAME', DB::raw('count(RESULT_TEST_ID) as RESULT_TEST_ID'))
        ->groupBy('PATIENT_ID_OPT','DEVICE_ID1','PATIENT_NAME')
        ->get();
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

//  dd($row->ID);  
                           $btn = '<a href="'.route('test.detail',array('id'=>$row->PATIENT_ID_OPT)).'" data-toggle="tooltip"  class="edit btn btn-primary btn-sm ">Detail</a>';
                           $btn = $btn.' <a href="'.route('test.edit',$row->PATIENT_ID_OPT).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-warning btn-sm deletePost">Edit</a>';
                           $btn = $btn.' <a href="'.route('test.hapus',$row->PATIENT_ID_OPT).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';

    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

     
    }

       //detail
     //detail
    public function detail($id){
        $model= Test::find($id);
        return view('test.detail',compact('model'));     
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
         return redirect()->route('test.index')->with('success', 'Pasien created successfully');
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
         return redirect()->route('test.index')->with('success', 'Pasien updated successfully');
    }

  


    //edit
    public function edit($id){
        $model= Patient::find($id);
        return view('test.edit',compact('model'));     
    }

      //hapus
    public function hapus($id){
        $model= Test::find($id)->delete();
      return redirect()->route('test.index')->with('success', 'Pasien deleted successfully');
    }
}
