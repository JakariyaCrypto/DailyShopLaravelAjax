<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['orders'] = DB::table('orders')->get();
            // prx($result);
        return view('Admin.Dashboard.order',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
///order detail
    public function orderDetail(Request $request,$id)
        {
            $result['order_detail'] =  DB::table('order_details')
                    ->select('orders.*','orders.total_amount','order_details.price','order_details.qty','products.name as pname','product_attrs.attr_image','sizes.size','colors.color')
                    ->leftJoin('orders','orders.id','=','order_details.order_id')
                    ->leftJoin('product_attrs','product_attrs.id','=','order_details.order_id')
                    ->leftJoin('products','products.id','=','product_attrs.product_id')
                    ->leftJoin('sizes','sizes.id','=','product_attrs.size_id')
                    ->leftJoin('colors','colors.id','=','product_attrs.color_id')
                    ->where(['orders.id'=>$id])
                    ->where(['orders.customer_id'=>$request->session()
                        ->get('FRONT_USER_ID')])
                    ->get();
                    if (!isset($result['order_detail'][0])) {
                        return redirect('/');
                        
                    }
                    // prx($result['order_detail']);
            return view('Admin.Dashboard.order_detail',$result);
        }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
