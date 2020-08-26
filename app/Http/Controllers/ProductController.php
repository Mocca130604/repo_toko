<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Illuminate\Support\facades\Validator;

class ProductController extends Controller
{
    public function show()
        {
        return Product::all();
        }

        public function store(request $request)
        {
    
        
        $validator=Validator::make($request->all(),
            [
                'id_barang' => 'required',
                'nama_barang' => 'required',
                'harga_barang' => 'required'
                
            ]
        );

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        $simpan = product::create([
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang
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

                    'nama_barang' => 'required' ,
                    'harga_barang' => 'required'
                
                ]

            );
            if($validator->fails()) {
                return Response()->json($validator->errors());
            }

            $ubah = Product::where('id_barang', $id)->update([

                'nama_barang' => $request->nama_barang,
                'harga_barang' => $request->harga_barang

            ]);

            if($ubah) {
                return Response()->json(['status' => 1]);
            }
            else {
                return Response()->json(['status' => 0]);
            }
        }
    
}
