<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\backend\Size;

use Illuminate\Http\Request;
class SizeController extends Controller
{
// add category form view
public function manageSize($id='')
{
    if($id>0){
        $arr = Size::where(['id'=>$id])->get();
        $result['size'] = $arr['0']->size;
        $result['id'] = $arr['0']->id;
    }else{
        $result['size'] = '';
        $result['id'] = 0;
    }

    return view('Admin.Dashboard.manage_size',$result);

}

// category show
public function Size()
{
    $result['data'] = Size::all();
    return view('Admin.Dashboard.size',$result);
    
}

// categroy store
public function SizeProcess(Request $request)
{

    $request->validate([

        'size'=>'required|unique:sizes,size,'.$request->post('id'),

    ]);

    if($request->post('id')>0){

        $model = Size::find($request->post('id'));
        $msg = "Size Updated";

    }else{

        $model = new Size();
        $msg = "Size Inserted";
    }

    $model->size = $request->post('size');
    $model->save();
    $request->session()->flash('message',$msg);
    return redirect()->route(('size'));

}

// category delete
public function delete(Request $request,$id)
{

    $model = Size::find($id);
    $model->delete();

    $request->session()->flash('warning','Size Deleted');
    return redirect('admin/size');
}

// category status
public function status(Request $request,$status,$id)
{

    $model = Size::find($id);
    $model->status = $status;
    $model->save();

    $request->session()->flash('message','Size Status Updated');
    return redirect('admin/size');
}

}
