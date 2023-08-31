<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use App\Models\Testdata;
use App\Models\MasterTindakan;
use App\Models\MutasiTindakan;

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
$data = Patient::select(DB::raw("CONCAT(name, ' - ', no_rm) AS text"), 'id')
        ->where('name', 'LIKE', "%$search%")
        ->orWhere('no_rm', 'LIKE', "%$search%")
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


 //getTindakan
     public function getTindakan(Request $request)
    {
        $search = $request->term;
$data = MasterTindakan::select(DB::raw("CONCAT(name, ' - ', stok) AS text"), 'id')
        ->where('name', 'LIKE', "%$search%")
        ->orWhere('stok', 'LIKE', "%$search%")
        ->get();
        return response()->json($data);
    }

    //store
     public function store(Request $request)
    {
        // dd($request->post());
        $pasien = Patient::find($request->pasien);

        foreach($request->tindakan as $key=>$value){
            $stok = MasterTindakan::find($key)->stok;
            $test = MasterTindakan::find($key)->name;
            $tindakan = MasterTindakan::find($key);
           
            foreach($value as $mutasi){
$output = str_replace(',', '.', $mutasi);
// var_dump($output); // string(4) "5.50"
$number = (float)$output;
                 $hasil = (float)$stok - $number;
            // dd($hasil);
                 $model = new Testdata();
                $model->PATIENT_ID_OPT = $pasien->no_rm;
                $model->PATIENT_NAME = $pasien->name;
                $model->RESULT_TEST_ID = $test;
                $model->RESULT_VALUE = $mutasi;
                $model->RESULT_DATE = now();
                $model->save();

                $modelmutasi = new MutasiTindakan();
                $modelmutasi->tanggal = now();
                $modelmutasi->mutasi = $hasil;
                $modelmutasi->patien_id = $pasien->id;
                $modelmutasi->tindakan_id = $tindakan->id;
                $modelmutasi->save();

                // pungurangan stok
                $tindakan->stok = $hasil;
                $tindakan->save();
            }

            
        }
   

           return redirect()->route('testdata.index')->with('success', 'Order created successfully');


    }

}
