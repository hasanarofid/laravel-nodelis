<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use App\Models\Testdata;

class OrderController extends Controller
{
     //index
    public function index(){
        return view('order.index');     
    }
    //getpasien
    public function getpasien(Request $request)
    {
        $search = $request->term;
$data = Patient::select(DB::raw("CONCAT(name, ' - ', nik) AS text"), 'id')
        ->where('name', 'LIKE', "%$search%")
        ->orWhere('nik', 'LIKE', "%$search%")
        ->get();
        
        return response()->json($data);
    }

    //getDokter

     public function getDokter(Request $request)
    {
        $search = $request->term;
$data = Doctor::select(DB::raw("CONCAT(name, ' - ', nik) AS text"), 'id')
        ->where('name', 'LIKE', "%$search%")
        ->orWhere('nik', 'LIKE', "%$search%")
        ->get();
        
        

        return response()->json($data);
    }

    //store
     public function store(Request $request)
    {
        $pasien = Patient::find($request->pasien);
        $dokter = Doctor::find($request->dokter);
// dd($request);
// RESULT_TEST_ID
// RESULT_VALUE
            // HGB
        foreach($request->hgb as $val){
            $model = new Testdata();
            $model->PATIENT_ID_OPT = $pasien->id;
            $model->PATIENT_NAME = $pasien->name;
            $model->RESULT_TEST_ID = 'HGB';
            $model->RESULT_VALUE = $val;
            $model->RESULT_DATE = now();
            $model->save();
        }
         // end save HGB

         // WBC
        foreach($request->wbc as $val){
            $model = new Testdata();
            $model->PATIENT_ID_OPT = $pasien->id;
            $model->PATIENT_NAME = $pasien->name;
            $model->RESULT_TEST_ID = 'WBC';
            $model->RESULT_VALUE = $val;
            $model->RESULT_DATE = now();
            $model->save();
        }
         // end save WBC

          // PLT
        foreach($request->plt as $val){
            $model = new Testdata();
            $model->PATIENT_ID_OPT = $pasien->id;
            $model->PATIENT_NAME = $pasien->name;
            $model->RESULT_TEST_ID = 'PLT';
            $model->RESULT_VALUE = $val;
            $model->RESULT_DATE = now();
            $model->save();
        }
         // end save PLT

            // RBC
        foreach($request->rbc as $val){
            $model = new Testdata();
            $model->PATIENT_ID_OPT = $pasien->id;
            $model->PATIENT_NAME = $pasien->name;
            $model->RESULT_TEST_ID = 'RBC';
            $model->RESULT_VALUE = $val;
            $model->RESULT_DATE = now();
            $model->save();
        }
         // end save RBC

          // HCT
        foreach($request->hct as $val){
            $model = new Testdata();
            $model->PATIENT_ID_OPT = $pasien->id;
            $model->PATIENT_NAME = $pasien->name;
            $model->RESULT_TEST_ID = 'HCT';
            $model->RESULT_VALUE = $val;
            $model->RESULT_DATE = now();
            $model->save();
        }
         // end save HCT

         // MCV
        foreach($request->mcv as $val){
            $model = new Testdata();
            $model->PATIENT_ID_OPT = $pasien->id;
            $model->PATIENT_NAME = $pasien->name;
            $model->RESULT_TEST_ID = 'MCV';
            $model->RESULT_VALUE = $val;
            $model->RESULT_DATE = now();
            $model->save();
        }
         // end save MCV

         // MCH
        foreach($request->mch as $val){
            $model = new Testdata();
            $model->PATIENT_ID_OPT = $pasien->id;
            $model->PATIENT_NAME = $pasien->name;
            $model->RESULT_TEST_ID = 'MCH';
            $model->RESULT_VALUE = $val;
            $model->RESULT_DATE = now();
            $model->save();
        }
         // end save MCH

         // MCHC
        foreach($request->mchc as $val){
            $model = new Testdata();
            $model->PATIENT_ID_OPT = $pasien->id;
            $model->PATIENT_NAME = $pasien->name;
            $model->RESULT_TEST_ID = 'MCHC';
            $model->RESULT_VALUE = $val;
            $model->RESULT_DATE = now();
            $model->save();
        }
         // end save MCH

         // pltclumps
        foreach($request->pltclumps as $val){
            $model = new Testdata();
            $model->PATIENT_ID_OPT = $pasien->id;
            $model->PATIENT_NAME = $pasien->name;
            $model->RESULT_TEST_ID = 'PLT_Clumps';
            $model->RESULT_VALUE = $val;
            $model->RESULT_DATE = now();
            $model->save();
        }
         // end save PLT_Clumps

           return redirect()->route('testdata.index')->with('success', 'Order created successfully');


    }

}
