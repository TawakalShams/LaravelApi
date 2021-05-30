<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayInsuaredModel;
use Illuminate\Support\Facades\DB;

class PayInsuared extends Controller
{
    public function index()
    {
        $total = PayInsuaredModel::sum('amount');

        return response()->json([
            'total_balance' => $total,
            // 'insuaredPay' => PayInsuaredModel::all(),
            'insuaredPay' =>
            DB::table('payinsuared')
                ->select('*')
                ->join('insuarance', 'insuarance.insuaranceid', '=', 'payinsuared.insuaranceid')
                ->join('vehicles', 'vehicles.vehicleid', '=', 'insuarance.vehicleid')
                ->join('customers', 'customers.vehicleid', '=', 'vehicles.vehicleid')
                ->get()
        ], 200);
    }
}
