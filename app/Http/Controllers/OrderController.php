<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function GetOrders( Request $request ){

        $datos = $request->json()->all();

        // $data_customer = DB::table('data_customers')
        //     ->where('document','=',$datos['documento'])
        //     ->get();
        // $data_pedido = DB::table('orders')
        // ->where('order_code','=',$datos['codigo'])
        // ->get();
        // $data_productos = DB::table('wv_productos')
        // ->where('id_cliente','=',$data_customer['id'])
        // ->get();
        $data_customer = DB::table('vw_pedidos_cliente')
        ->where('document','=',$datos['documento'])
        ->where('order_code','=',$datos['codigo'])
        ->get();

        $result = $data_customer->toArray();

        return response()->json($result);

    }
}
