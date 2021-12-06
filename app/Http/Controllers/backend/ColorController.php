<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\backend\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
//color table page show
    public function Color()
    {

        $result['data'] = Color::all();
        return view('Admin.Dashboard.color',$result);

    }

//add color form 
    public function manageColor($id='')
    {
       
        if($id){
            $arr = Color::where(['id'=>$id])->get();
            $result['color'] = $arr['0']->color;
            $result['id'] = $arr['0']->id;

        }else{
            $result['color'] = '';
            $result['id'] = '';
        }
        return view('Admin.Dashboard.manage_color',$result);

    }

//store color
    public function colorProcess(Request $request)
    {

        $request->validate([
            'color'=>'required|unique:colors,color,'.$request->post('id'),
        ]);

        if($request->post('id')){
            $id    = $request->post('id');
            $model = Color::find($id);
            $msg   = "Color Updated";
        }else{
            $model = new Color();
            $msg   = "Color Inserted";
        }
       

        $model->color = $request->post('color');
        $model->save();

        $request->session()->flash('message',$msg);

        return redirect()->route('color');

    }
//color delete
    public function Delete(Request $request,$id)
    {

        $model = Color::find($id);
        $model->delete();

        $request->session()->flash('warning','Color Delete Successfully');
        return redirect()->route('color');

    }

//color status update
    public function Status(Request $request,$status,$id)
    {
        $model = Color::find($id);
        $model->status = $status;
        $model->save();

        $request->session()->flash('message','Color Updated Successfull !');
        return redirect()->route('color');
    }
}
