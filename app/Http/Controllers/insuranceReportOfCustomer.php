<?php

namespace App\Http\Controllers;

use App\Models\Insuarance; //this is a model
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class insuranceReportOfCustomer extends Controller
{
    public function show($insuaranceid)
    {
        return response()->json([
            $id = Insuarance::find($insuaranceid),
            //  WHERE insuaranceid = '$id'

            DB::select("SELECT * FROM insuarance 
            JOIN vehicles ON insuarance.vehicleid = insuarance.vehicleid 
            JOIN  customers ON customers.vehicleid = vehicles.vehicleid 
            WHERE insuaranceid = '$id'
            ")
            //   $id = Insuarance::find($insuaranceid),
            // DB::table('insuarance')
            //     ->join('vehicles', 'vehicles.vehicleid', '=', 'insuarance.vehicleid')
            //     ->join('customers', 'customers.vehicleid', '=', 'vehicles.vehicleid')
            //     // ->select('insuarance.*')
            //     // ->where('insuarance.insuaranceid', '=', $id)
            //     ->get()
        ], 200);
    }
}
