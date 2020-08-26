<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use Illuminate\Support\facades\Validator;

class OrderController extends Controller
{
    public function show()
    {
        $data_order = Order::join('Customer', 'order.id_customer', 'customer.id_customer' , 'order.id_barang' )-> get();
        return Response()->json($data_order);
    }

    public function store(request $request)
    {
        $validator=Validator::make($request->all(),
            [

                'id_order' => 'required',
                'tanggal_order' => 'required',
                'id_customer' => 'required',
                'id_barang' => 'required'

            ]
        );

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        $simpan = order::create([
            'id_order' => $request->id_order,
            'tanggal_order' => $request->tanggal_order,
            'id_customer' => $request->id_customer,
            'id_barang' => $request->id_barang



        ]);

        if($simpan)
        {
            return Response()->json(['status' => 1]);
        }
        else
        {
            return Response()->json(['status' => 0]);
        }
    }
}