<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\backend\cupon;
use Illuminate\Http\Request;

class cuponController extends Controller
{
    
// add category form view
public function manageCupon($id='')
    {
        if($id>0){
            $arr = cupon::where(['id'=>$id])->get();
            $result['title'] = $arr['0']->title;
            $result['code'] = $arr['0']->code;
            $result['value'] = $arr['0']->value;
            $result['type'] = $arr['0']->type;
            $result['min_order_amt'] = $arr['0']->min_order_amt;
            $result['is_one_time'] = $arr['0']->is_one_time;
            $result['id'] = $arr['0']->id;
        }else{
            $result['title'] = '';
            $result['code'] = '';
            $result['value'] = '';
            $result['type'] = '';
            $result['min_order_amt'] = '';
            $result['is_one_time'] = '';
            $result['id'] = 0;
        }

        return view('Admin.Dashboard.manage_cupon',$result);

    }

// category show
public function Cupon()
    {
        $result['data'] = cupon::all();
        return view('Admin.Dashboard.cupon',$result);
        
    }

// categroy store
public function cuponProcess(Request $request)
    {

        $request->validate([

            'title'=>'required',
            'code'=>'required|unique:cupons,code,'.$request->post('id'),
            'value'=>'required',

        ]);

        if($request->post('id')>0){

            $model = cupon::find($request->post('id'));
            $msg = "Cupon Updated";

        }else{

            $model = new cupon();
            $msg = "Cupon Inserted";
        }

        $model->title = $request->post('title');
        $model->code = $request->post('code');
        $model->value = $request->post('value');
        $model->type = $request->post('type');
        $model->min_order_amt = $request->post('min_order_amt');
        $model->is_one_time = $request->post('is_one_time');
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect()->route(('cupon'));

    } 

// category delete
public function delete(Request $request,$id)
    {

        $model = Cupon::find($id);
        $model->delete();

        $request->session()->flash('warning','Cupon Deleted');
        return redirect('admin/cupon');
    }

// category status
public function status(Request $request,$status,$id)
    {

        $model = Cupon::find($id);
        $model->status = $status;
        $model->save();

        $request->session()->flash('message','Cupon Status Updated');
        return redirect('admin/cupon');
    }


}
