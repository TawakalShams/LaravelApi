<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehiclesModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'vehicles' =>
            DB::table('vehicles')
                ->select('*')
                // ->join('customers', 'customers.vehicleid', '=', 'vehicles.vehicleid')
                // ->join('payment', 'payment.customerid', '=', 'customers.customerid')
                ->get()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $vehicles = VehiclesModel::where('platenumber', $request['platenumber'])->first();

        // if ($vehicles) {
        //     return response()->json([
        //         'error' => true,
        //         'message' => ('Plate number already exists')
        //     ], 409);
        // } else {
        //     $validation = Validator::make($request->all(), [
        //         'platenumber'   => 'required',
        //         'type'      => 'required',
        //         // 'created_by' => 'required',
        //     ]);

        //     if ($validation->fails()) {
        //         return response()->json([
        //             'error' => true,
        //             'message' => $validation->errors()
        //         ], 200);
        //     } else {
        $vehicles = new VehiclesModel();
        $vehicles->platenumber = $request->input('platenumber');
        $vehicles->type = $request->input('type');
        $vehicles->created_by = $request->input('created_by');
        $vehicles->save();

        return response()->json([
            'vehicles' => $vehicles,
        ], 200);
        // }
        // }
    }


    public function show($platenumber)
    {
        return response()->json([
            'vehicles' => VehiclesModel::find($platenumber),
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $platenumber)
    {
        // $validation = Validator::make($request->all(), [
        //     'platenumber'   => 'required',
        //     'type'      => 'required',
        //     'created_by' => 'required',
        // ]);

        // if ($validation->fails()) {
        //     return response()->json([
        //         'error' => true,
        //         'messages'  => $validation->errors(),
        //     ], 200);
        // } else {
        // $bid = rand(10000000, 99999999);

        $vehicles = VehiclesModel::find($platenumber);
        //  $vehicles->platenumber = $request->input('platenumber');
        $vehicles->platenumber = $request->input('platenumber');
        $vehicles->type = $request->input('type');
        $vehicles->created_by = $request->input('created_by');
        $vehicles->save();
        return response()->json([
            'vehicles' => $vehicles,
        ], 200);
        // }
    }


    public function destroy($platenumber)
    {
        $vehicles = VehiclesModel::findOrFail($platenumber);
        $vehicles->delete();
        if ($vehicles) {
            return response()->json([
                'message' => 'vehicle Deleted!'
            ], 200);
        } else {
            return response()->json(null, 204);
        }
    }
}
