<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use Illuminate\Support\facades\Validator;

class CustomerController extends Controller
{
    public function show()
    {
        return Customer::all();
    }

    public function detail($id)
    {
        if(Customer::where('id_Customer', $id)->exists()) {
        $data_Customer = Customer::join('Customer', 'Customer.id_Customer', 'order.id_Customer', 'order.id_Barang')
        ->where('customer.id_customer', '=', $id)
        ->get();
        return Response()->json($data_Customer);
        }
        else {return Response()->json(['message' => 'Tidak ditemukan' ]);
        }
    }

    public function store(request $request)
    {
        $validator=Validator::make($request->all(),
            [

                'id_customer' => 'required',
                'nama_customer' => 'required',
                'alamat_customer' => 'required'
                
            ]
        );

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        $simpan = customer::create([
            'id_customer' => $request->id_customer,
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer
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
    public function update($id, Request $request)
    {
        $validator=Validator::make($request->all(),
            [

                'nama_customer' => 'required' ,
                'alamat_customer' => 'required'
            ]

        );
        if($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $ubah = Customer::where('id_customer', $id)->update([

            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer

        ]);

        if($ubah) {
            return Response()->json(['status' => 1]);
        }
        else {
            return Response()->json(['status' => 0]);
        }
    }
    public function destroy($id)
        {
        $hapus = Customer::where('id_customer', $id)->delete();
        if($hapus) {
        return Response()->json(['status' => 1]);
        }
        else {
        return Response()->json(['status' => 0]);
        }
    }
}
