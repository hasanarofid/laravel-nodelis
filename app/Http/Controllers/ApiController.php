<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Demographics_Lis;
use App\Models\OrderedItem_Lis;
use App\Models\Registration_Lis;
use App\Models\ResultBridge_Lis;



class ApiController extends Controller
{
    public function ambilDataDemografi()
    {
        try {
            $data = Demographics_Lis::all();
            return response()->json(['status' => 'success', 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'success', 'error' => 'Terjadi kesalahan'], 500);
        }
    }

    public function dataOrderedItem()
    {
        try {
            $data = OrderedItem_Lis::all();
            return response()->json(['status' => 'success', 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'success', 'error' => 'Terjadi kesalahan'], 500);
        }
    }

    public function dataRegistration()
    {
        try {
            $data = Registration_Lis::all();
            return response()->json(['status' => 'success', 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'success', 'error' => 'Terjadi kesalahan'], 500);
        }
    }

    public function dataResultBridge()
    {
        try {
            $data = ResultBridge_Lis::all();
            return response()->json(['status' => 'success', 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'success', 'error' => 'Terjadi kesalahan'], 500);
        }
    }
}
