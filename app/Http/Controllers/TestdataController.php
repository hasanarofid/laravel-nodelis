<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testdata;
use Illuminate\Support\Facades\DB;
use App\Models\OrderData;
use DataTables;

class TestdataController extends Controller
{
    //index
    public function index()
    {
        return view('testdata.index');
    }

    //get datatable
    public function list(Request $request)
    {
        // dd($request)
        if ($request->ajax()) {
            $data = Testdata::select('PATIENT_ID_OPT', 'DEVICE_ID1', 'PATIENT_NAME', DB::raw('count(RESULT_TEST_ID) as RESULT_TEST_ID'))
                ->groupBy('PATIENT_ID_OPT', 'DEVICE_ID1', 'PATIENT_NAME')
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
                ->addColumn('action', function ($row) {

                    //  dd($row->ID);  
                    $btn = '<a href="' . route('testdata.detail', array('id' => $row->PATIENT_ID_OPT)) . '" data-toggle="tooltip"  class="edit btn btn-primary btn-sm ">Detail</a>';
                    $btn = $btn . ' <a href="' . route('testdata.edit', $row->PATIENT_ID_OPT) . '" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-warning btn-sm deletePost">Edit</a>';
                    $btn = $btn . ' <a href="' . route('testdata.hapus', $row->PATIENT_ID_OPT) . '" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
                    $btn = $btn . '<a href="#"  onclick="transferData(\'' . $row->PATIENT_ID_OPT . '\')"   class="btn btn-sm bg-info text-white" ><i class="fa fa-send-o" aria-hidden="true"></i>&nbsp;&nbsp;Transfer Order</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    //detail
    public function detail($id)
    {
        // dd($id);
        $model = Testdata::where('PATIENT_ID_OPT', $id)->first();
        $data = Testdata::where('PATIENT_ID_OPT', $id)->get();
        // dd($model);
        return view('testdata.detail', compact('model', 'data'));
    }

    //transfer data
    public function transfer()
    {
        $model = Testdata::get();
        $kode_transaksi = $this->kodetransaksi();
        foreach ($model as $value) {
            $cek = OrderData::where('PATIENT_ID_OPT', $value->PATIENT_ID_OPT)->where('RESULT_TEST_ID', $value->RESULT_TEST_ID)->first();
            if ($cek) {
                // String yang mengandung koma
                $angka1 = $cek->RESULT_VALUE;
                $angka2 = $value->RESULT_VALUE;

                // Menghapus koma dan mengubah string menjadi float
                $floatAngka1 = number_format(str_replace(',', '.', $angka1), 2, '.', '');
                $floatAngka2 = number_format(str_replace(',', '.', $angka2), 2, '.', '');
                // dd($floatAngka2);

                // $floatAngka1 = floatval(str_replace(',', '', $angka1));
                // $floatAngka2 = floatval(str_replace(',', '', $angka2));

                // Melakukan penambahan
                $hasilPenambahan = (int)$cek->RESULT_VALUE + $floatAngka2;
                $hasilAkhir = number_format($hasilPenambahan, 2, '.', ',');
                // $query = OrderData::where('PATIENT_ID_OPT', $value->PATIENT_ID_OPT)->where('RESULT_TEST_ID', $value->RESULT_TEST_ID);
                // // dd($hasilAkhir);die;
                // //  dd($value);
                // $query->update([
                //     'TIMESTAMP' => now(),
                //     'DATE_TIME_STAMP' => now(),
                //     // 'PATIENT_ID_OPT' => $value->PATIENT_ID_OPT,
                //     // 'PATIENT_NAME' => $value->PATIENT_NAME,
                //     // 'RESULT_TEST_ID' => $value->RESULT_TEST_ID,
                //     'RESULT_VALUE' => $hasilAkhir,
                //     'RESULT_STATUS' => 'transfer',
                //     'RESULT_DATE' => now()
                // ]);
                $model = new OrderData();
                $model->TIMESTAMP = now();
                //   $model->KODETRANSAKSI = $kode_transaksi;
                $model->DATE_TIME_STAMP = now();
                $model->PATIENT_ID_OPT = $value->PATIENT_ID_OPT;
                $model->PATIENT_NAME = $value->PATIENT_NAME;
                $model->RESULT_TEST_ID = $value->RESULT_TEST_ID;

                $model->RESULT_VALUE =  $value->RESULT_VALUE;
                $model->RESULT_STATUS = 'transfer';
                $model->RESULT_DATE = now();
                // dd($model);
                $model->save();
            } else {
                // Jika tidak memenuhi kondisi, lewati pembaruan
                continue;
            }
        }

        return redirect()->route('order.list')->with('success', 'Order data berhasil di transfer ke test data');
    }

    public function kodetransaksi()
    {

        $initial_r = "LAB-TF";
        $default = "001";
        $prefix = $initial_r . date('Ymd');
        $transaksi = OrderData::select(DB::raw('CAST(MAX(SUBSTR(KODETRANSAKSI,' . (strlen($prefix) + 1) . ',' . (strlen($default)) . ')) AS integer) KODETRANSAKSI'))
            ->where('KODETRANSAKSI', 'like', '' . $prefix . '%')
            ->first();
        $no_baru = $prefix . (isset($transaksi->KODETRANSAKSI) ? (str_pad($transaksi->KODETRANSAKSI + 1, strlen($default), 0, STR_PAD_LEFT)) : $default);
        return $no_baru;
    }

    // hapus data
    public function hapus($id)
    {
        // dd($id);
        $model = Testdata::where('PATIENT_ID_OPT', $id)->delete();
        return redirect()->route('testdata.index')->with('success', 'test data deleted successfully');
    }

    // transfertest
    public function transfertest($id, Request $request)
    {
        $model =
            Testdata::where('PATIENT_ID_OPT', $id)->get();
        foreach ($model as $value) {
            // $cek = OrderData::where('PATIENT_ID_OPT', $value->PATIENT_ID_OPT)->where('RESULT_TEST_ID', $value->RESULT_TEST_ID)->first();

            $model = new OrderData();
            $model->TIMESTAMP = now();
            //   $model->KODETRANSAKSI = $kode_transaksi;
            $model->DATE_TIME_STAMP = now();
            $model->PATIENT_ID_OPT = $value->PATIENT_ID_OPT;
            $model->PATIENT_NAME = $value->PATIENT_NAME;
            $model->RESULT_TEST_ID = $value->RESULT_TEST_ID;

            $model->RESULT_VALUE =  $value->RESULT_VALUE;
            $model->RESULT_STATUS = 'transfer';
            $model->RESULT_DATE = now();
            // dd($model);
            $model->save();
        }

        return redirect()->route('order.list')->with('success', 'Order data berhasil di transfer ke test data');
    }

    //cekpasien
    public function cekpasien(Request $request)
    {
        $order = OrderData::where('PATIENT_ID_OPT', $request->pasien_id)->first();
        $data = [];
        if ($order) {
            $data['status'] = 'ada';
            $data['pesan'] = 'Apakah anda akan melakukan transfer data ?';

            $tableData = OrderData::where('PATIENT_ID_OPT', $request->pasien_id)->get();
            $data['tabel'] = $tableData;
            // dd($tableData);
            // Return the HTML for the table view
            // return view('testdata.table-view', compact('tableData'));
        } else {
            $data['status'] = 'tidak ada';
            $data['pesan'] = 'Data Order Tidak ada, tidak bisa dilakukan transfer';
            $data['tabel'] = 'kosong';
        }
        // dd($data);
        return response()->json($data);
    }

    //loadtabledata
    public function loadtabledata(Request $request)
    {
        $tableData = OrderData::select('PATIENT_ID_OPT', 'PATIENT_NAME', 'TIMESTAMP', DB::raw('count(RESULT_TEST_ID) as RESULT_TEST_ID'))
            ->groupBy('PATIENT_ID_OPT', 'PATIENT_NAME', 'TIMESTAMP')
            ->where('PATIENT_ID_OPT', $request->pasien_id)
            ->where('RESULT_STATUS', 'Pending')
            ->get();

        return view('testdata.table-view', compact('tableData'));
    }

    // senddata
    public function senddata(Request $request)
    {
        $id = $request->pasien_id;
        foreach ($request->selectedData as $time) {
            $cek = OrderData::where('PATIENT_ID_OPT', $id)
                ->where('TIMESTAMP', $time)->orderBy('ID', 'DESC')->get();

            foreach ($cek as $order) {
                $value = Testdata::where('PATIENT_ID_OPT', $id)
                    ->where('RESULT_TEST_ID', $order->RESULT_TEST_ID)->first();
                OrderData::where('PATIENT_ID_OPT', $id)
                    ->where('TIMESTAMP', $time)
                    ->where('RESULT_TEST_ID', $order->RESULT_TEST_ID)
                    ->update([
                        'TIMESTAMP' => now(),
                        'DATE_TIME_STAMP' => now(),
                        'RESULT_VALUE' => !empty($value) ? $value->RESULT_VALUE : null,
                        'RESULT_STATUS' => 'menunggu validasi',
                        'RESULT_DATE' => now(),
                    ]);
                // dd($data);
            }
            // $data = Testdata::where('PATIENT_ID_OPT', $id)->get();
            // dd($data->count());
            // foreach ($data as $value) {
            //     // dd($value->PATIENT_NAME);
            //     // die;
            //     OrderData::where('PATIENT_ID_OPT', $id)
            //         ->where('TIMESTAMP', $time)
            //         ->update([
            //             'TIMESTAMP' => now(),
            //             'DATE_TIME_STAMP' => now(),
            //             'PATIENT_NAME' => $value->PATIENT_NAME,
            //             'RESULT_TEST_ID' => $value->RESULT_TEST_ID,
            //             'RESULT_VALUE' => $value->RESULT_VALUE,
            //             'RESULT_STATUS' => 'menunggu validasi',
            //             'RESULT_DATE' => now(),
            //         ]);
            // }
        }



        return response()->json('transfer successfully');
        // return redirect()->route('order.list')->with('success', 'Order created successfully');
        // dd($request->post());
    }
}
