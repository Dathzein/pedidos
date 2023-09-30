<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function GetOrders( Request $request ){

        $datos = $request->json()->all();

        $data_customer = DB::table('vw_pedidos_cliente')
        ->where('document','=',$datos['documento'])
        ->where('order_code','=',$datos['codigo'])
        ->get();

        $result = $data_customer->toArray();

        return response()->json([
            'message'=> 'Proceso exitosa.',
            'Lista' => $result
        ]);

    }
}
