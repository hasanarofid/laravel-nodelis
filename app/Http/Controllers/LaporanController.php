<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderData;
use App\Models\Inventory;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use App\Models\Testdata;
use App\Models\MasterTindakan;
use App\Models\MutasiTindakan;
use DataTables;
use PDF;

class LaporanController extends Controller
{
    //index
    public function index(){
         return view('laporan.index');     
    }

    //get datatable
    public function listdata(Request $request){
        // dd($request)
         if ($request->ajax()) {
             $data = OrderData::select('PATIENT_ID_OPT','KODETRANSAKSI','PATIENT_NAME', DB::raw('count(RESULT_TEST_ID) as RESULT_TEST_ID'))
        ->groupBy('PATIENT_ID_OPT','KODETRANSAKSI','PATIENT_NAME')
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
                           $btn = '<a href="'.route('laporan.detail',array('id'=>$row->PATIENT_ID_OPT)).'" data-toggle="tooltip"  class="edit btn btn-primary btn-sm ">Detail</a>';
                           $btn = $btn.' <a href="'.route('laporan.print',$row->PATIENT_ID_OPT).'" target="_blank" class="btn btn-warning btn-sm deletePost">Print</a>';
                  
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

     
    }

    public function print($id){
       

    $model = OrderData::where('PATIENT_ID_OPT',$id)->first();
    $pasien = Patient::where('no_rm',$id)->first();

    $id_master = MasterTindakan::where('name',$model->RESULT_TEST_ID)->first()->id_master;
    $inventory = Inventory::where('tindakan_id',$id_master)->get();
     $data = [
        'model' =>$model ,
        'pasien' =>$pasien 
    ];
    // dd($pasien);

    // Render tampilan Blade ke dalam PDF
        $pdf = PDF::loadView('laporan.kop_surat', $data);
        $pdf->getDomPDF()->getOptions()->set('isHtml5ParserEnabled', true);
$pdf->getDomPDF()->getOptions()->set('isPhpEnabled', true);

        // Set nama file PDF yang akan diunduh
        $nama_file = 'kop_surat.pdf';

        // Menggunakan inline() akan menampilkan PDF di browser
        // Jika ingin mengunduh PDF, ganti inline() menjadi download()
        return $pdf->stream($nama_file);
    }

      //detail
    public function detail($id){
        $model = OrderData::where('PATIENT_ID_OPT',$id)->first();
    $pasien = Patient::where('no_rm',$id)->first();

        return view('laporan.detail',compact('model','pasien'));     
    }
}
