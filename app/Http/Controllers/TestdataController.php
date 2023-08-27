<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testdata;
use Illuminate\Support\Facades\DB;

use DataTables;

class TestdataController extends Controller
{
    //index
    public function index(){
        return view('testdata.index');     
    }

     //get datatable
    public function list(Request $request){
        // dd($request)
         if ($request->ajax()) {
             $data = Testdata::select('PATIENT_ID_OPT','DEVICE_ID1','PATIENT_NAME', DB::raw('count(RESULT_TEST_ID) as RESULT_TEST_ID'))
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
                           $btn = '<a href="'.route('testdata.detail',array('id'=>$row->PATIENT_ID_OPT)).'" data-toggle="tooltip"  class="edit btn btn-primary btn-sm ">Detail</a>';
                           $btn = $btn.' <a href="'.route('testdata.edit',$row->PATIENT_ID_OPT).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-warning btn-sm deletePost">Edit</a>';
                           $btn = $btn.' <a href="'.route('testdata.hapus',$row->PATIENT_ID_OPT).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';

    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

     
    }

       //detail
        public function detail($id){
            // dd($id);
            $model = Testdata::where('PATIENT_ID_OPT',$id)->first();
            $data= Testdata::where('PATIENT_ID_OPT',$id)->get();
            // dd($model);
            return view('testdata.detail',compact('model','data'));   
        }

}
