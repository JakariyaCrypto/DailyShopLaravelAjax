<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\models\backend\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    // add category form view
public function manageTax($id='')
	{
	    if($id>0){
	        $arr = Tax::where(['id'=>$id])->get();
	        $result['tax_desc'] = $arr['0']->tax_desc;
	        $result['tax_value'] = $arr['0']->tax_value;
	        $result['id'] = $arr['0']->id;
	    }else{
	        $result['tax_desc'] = '';
	        $result['tax_value'] = '';
	        $result['id'] = 0;
	    }

	    return view('Admin.Dashboard.manage_tax',$result);

	}

// category show
public function Tax()
	{
	    $result['data'] = Tax::all();
	    return view('Admin.Dashboard.tax',$result);
	    
	}

// categroy store
public function TaxProcess(Request $request)
	{

	    $request->validate([

	        'tax_value'=>'required|unique:taxes,tax_value,'.$request->post('id'),

	    ]);

	    if($request->post('id')>0){

	        $model = Tax::find($request->post('id'));
	        $msg = "Tax Updated";

	    }else{

	        $model = new Tax();
	        $msg = "Tax Inserted";
	    }

	    $model->tax_value = $request->post('tax_value');
	    $model->tax_desc = $request->post('tax_desc');
	    $model->save();
	    $request->session()->flash('message',$msg);
	    return redirect()->route(('tax'));

	}

// category delete
public function delete(Request $request,$id)
	{

	    $model = Tax::find($id);
	    $model->delete();

	    $request->session()->flash('warning','Tax Deleted');
	    return redirect('admin/tax');
	}

// category status
public function status(Request $request,$status,$id)
	{

	    $model = Tax::find($id);
	    $model->status = $status;
	    $model->save();

	    $request->session()->flash('message','Tax Status Updated');
	    return redirect('admin/tax');
	}


}
