<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customers; //this is a model

class CustomerController extends Controller
{
    public function index()
    {
        return response()->json([
            'customers' => Customers::all(),
        ], 200);
    }


    public function store(Request $request)
    {
        $agents = Customers::where('customerid', $request['customerid'])->first();

        if ($agents) {
            return response()->json([
                'error' => true,
                'message' => ('customer id already exists')
            ], 409);
        } else {
            $validation = Validator::make($request->all(), [
                'fullName'        => 'required',
                'gender'          => 'required',
                'dob'             => 'required',
                'address'         => 'required',
                'phone'           => 'required',
                'platenumber'     => 'required',
                'created_by'      => 'required',

            ]);

            if ($validation->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => $validation->errors()
                ], 200);
            } else {
                $customer = new Customers();
                $customer->fullName = $request->input('fullName');
                $customer->gender = $request->input('gender');
                $customer->dob = $request->input('dob');
                $customer->address = $request->input('address');
                $customer->phone = $request->input('phone');
                $customer->platenumber = $request->input('platenumber');
                $customer->created_by = 'Tawakal Shams';
                $customer->save();

                return response()->json([
                    'customer' => $customer,
                ], 200);
            }
        }



        // public function update(Request $request, $customerid)
        // {
        //         $validation = Validator::make($request->all(),[ 
        //         'fullName'  	  => 'required',
        //         'gender'    	  => 'required',
        //         'dob'       	  => 'required',
        //         'address'   	  => 'required',
        //         'phone'     	  => 'required',
        //         'platenumber'     => 'required',
        //         'created_by'      => 'required',
        //     ]);

        //     if($validation->fails()){
        //         return response()->json([
        //             'error' => true,
        //             'messages'  => $validation->errors(),
        //         ], 200);
        //     }
        //     else
        //     {

        //         //$agents = Customer::find($agentid);
        //         $customer = Customers_model::find($customerid);

        //         $customer->fullName = $request->input('fullName');
        //         $customer->gender = $request->input('gender');
        //         $customer->dob = $request->input('dob');
        //         $customer->address = $request->input('address');
        //         $customer->phone = $request->input('phone');
        //         $customer->platenumber = $request->input('platenumber');
        //         $customer->created_by = $request->input('created_by');
        //         $customer->save();

        //         return response()->json([
        //             'customer'=> $customer,
        //         ], 200);


        //     }
        // }




    }
}
