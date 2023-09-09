<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use App\Models\Testdata;
use App\Models\MasterTindakan;
use App\Models\MutasiTindakan;
use App\Models\OrderData;
use App\Models\Inventory;
use DataTables;
use PDF;

class OrderController extends Controller
{
     //index
    public function index(){
        return view('order.index');     
    }
    //redirect list
    public function list(){
        return view('order.list');     
    }
    //get datatable
    public function listdata(Request $request){
        // dd($request)
         if ($request->ajax()) {
             $data = OrderData::select('PATIENT_ID_OPT','PATIENT_NAME', DB::raw('count(RESULT_TEST_ID) as RESULT_TEST_ID'))
        ->groupBy('PATIENT_ID_OPT','PATIENT_NAME')
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
                           $btn = '<a href="'.route('order.detail',array('id'=>$row->PATIENT_ID_OPT)).'" data-toggle="tooltip"  class="edit btn btn-primary btn-sm ">Detail</a>';
                           $btn = $btn.' <a href="'.route('order.print',$row->PATIENT_ID_OPT).'" data-toggle="tooltip"  class="btn btn-warning btn-sm deletePost">Print</a>';
                  
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

     
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
        ->whereNull('id_master')
        ->get();
        return response()->json($data);
    }

    //store
     public function store(Request $request)
    {
        // dd($request->post());
        $pasien = Patient::find($request->pasien);
        $total_inventory = count($request->tindakan);
        // dd($request->paket);
        //proses inventory
         foreach($request->paket as $key=>$value){
                $inventory = Inventory::where('tindakan_id', $key)->get();
               $pengurangan = 1;
            foreach($inventory as $inv){
                $inves = Inventory::find($inv->id);
                $kurang = $inves->stok - $pengurangan;
                //  dd($kurang);

                 $modelmutasi = new MutasiTindakan();
                $modelmutasi->tanggal = now();
                $modelmutasi->mutasi = $pengurangan;
                $modelmutasi->patien_id = $pasien->id;
                $modelmutasi->inventory_id = $inves->id;
                $modelmutasi->save();

                // pungurangan stok
                $inves->stok = $kurang;
                $inves->save();
               
            }

            
              
         }
         $kode_transaksi = $this->kodetransaksi($pasien->no_rm);


        foreach($request->tindakan as $key=>$value){
            $stok = MasterTindakan::find($key)->stok;
            $test = MasterTindakan::find($key)->name;
            $tindakan = MasterTindakan::find($key);
          
            foreach($value as $mutasi){
                                 $model = new OrderData();
                $model->KODETRANSAKSI = $kode_transaksi;

                $output = str_replace(',', '.', $mutasi);
                // var_dump($output); // string(4) "5.50"
                $number = (float)$output;
                 $hasil = (float)$stok - $number;
            // dd($hasil);
               
                $model->PATIENT_ID_OPT = $pasien->no_rm;
                $model->PATIENT_NAME = $pasien->name;
                $model->RESULT_TEST_ID = $test;
                $model->RESULT_VALUE = $mutasi;
                $model->RESULT_DATE = now();
                $model->save();

              
            }

            
        }
   

           return redirect()->route('order.list')->with('success', 'Order created successfully');


    }

    public function getlistTindakan(Request $request){
        $id_master = $request->id_master;

        $data = MasterTindakan::where('id_master',$id_master)
        ->get();
        return response()->json($data);
    }

     public function kodetransaksi($no_rm)
    {
        $initial_r = "LAB";
$default = "001";
$prefix = $initial_r . date('Ymd');

// Find the maximum transaction code for a specific patient
$transaksi = OrderData::select(DB::raw('CAST(MAX(SUBSTR(KODETRANSAKSI,' . (strlen($prefix) + 1) . ',' . (strlen($default)) . ')) AS integer) KODETRANSAKSI'))
    ->where('KODETRANSAKSI', 'like', '' . $prefix . '%')
    ->where('PATIENT_ID_OPT', '=', $no_rm) // Replace $your_pasien_id with the actual patient ID
    ->first();

// Generate a new transaction code
$no_baru = $prefix . (isset($transaksi->KODETRANSAKSI) ? (str_pad($transaksi->KODETRANSAKSI + 1, strlen($default), '0', STR_PAD_LEFT)) : $default);
        // $initial_r = "LAB";
        // $default = "001";
        // $prefix = $initial_r . date('Ymd');
        // $transaksi = OrderData::select(DB::raw('CAST(MAX(SUBSTR(KODETRANSAKSI,' . (strlen($prefix) + 1) . ',' . (strlen($default)) . ')) AS integer) KODETRANSAKSI'))
        //     ->where('KODETRANSAKSI', 'like', '' . $prefix . '%')
        //     ->first();
        // $no_baru = $prefix . (isset($transaksi->KODETRANSAKSI) ? (str_pad($transaksi->KODETRANSAKSI + 1, strlen($default), 0, STR_PAD_LEFT)) : $default);
        return $no_baru;
    }

         //detail
    public function detail($id){

       $model = OrderData::where('PATIENT_ID_OPT',$id)->first();
            $data= OrderData::where('PATIENT_ID_OPT',$id)->get();
            $master = [];
            foreach($data as $value){
                $master[] = $value->RESULT_TEST_ID;
            }
            $paket = MasterTindakan::whereIn('name', $master)->whereNotNull('id_master')->first()->id_master;
            $nama_paket = MasterTindakan::find($paket)->name;
                // dd($nama_paket);


        return view('order.detail',compact('model','data','nama_paket'));     
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
        $pdf = PDF::loadView('order.print', $data);
        $pdf->getDomPDF()->getOptions()->set('isHtml5ParserEnabled', true);
$pdf->getDomPDF()->getOptions()->set('isPhpEnabled', true);

        // Set nama file PDF yang akan diunduh
        $nama_file = 'kop_surat.pdf';

        // Menggunakan inline() akan menampilkan PDF di browser
        // Jika ingin mengunduh PDF, ganti inline() menjadi download()
        return $pdf->stream($nama_file);
    }

    //transfer data
    public function transfer(){
        $model = OrderData::get();
        foreach($model as $value){
            //  dd($value);
            $test = new Testdata();
            $test->TIMESTAMP = $value->TIMESTAMP;
            $test->DATE_TIME_STAMP = $value->DATE_TIME_STAMP;
            $test->PATIENT_ID_OPT = $value->PATIENT_ID_OPT;
            $test->PATIENT_NAME = $value->PATIENT_NAME;
            $test->RESULT_TEST_ID = $value->RESULT_TEST_ID;

            $test->RESULT_VALUE = $value->RESULT_VALUE;
            $test->RESULT_STATUS = 'transfer';
            $test->RESULT_DATE = $value->RESULT_DATE;
            $test->save();
            
        }

        return redirect()->route('order.list')->with('success', 'Order data berhasil di transfer ke test data');

    }
}
