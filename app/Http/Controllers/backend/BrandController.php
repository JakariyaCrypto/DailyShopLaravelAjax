<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\backend\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
class BrandController extends Controller
{
//brand table page show
    public function Brand()
    {
        $result = Brand::all();
        return view('Admin.Dashboard.brand',compact('result'));

    }

//show brand insert form page 
    public function manageBrand($id='')
    {

        if($id>0){
            $arr = Brand::where(['id'=>$id])->get();
            $result['brand'] = $arr['0']->brand;
            $result['is_home'] = $arr['0']->is_home;
            $result['image'] = $arr['0']->image;
            $result['is_home_select'] = "";
            if ($arr['0']->is_home ==1) {
                $result['is_home_select'] = "checked";
            }

            $result['id'] = $arr['0']->id;

        }else{
            $result['brand'] = '';
            $result['is_home'] = '';
            $result['is_home_select'] = '';
            $result['image'] = '';
            $result['id'] = 0;
        }


        return view('Admin.Dashboard.manage_brand', $result);

    }

//brand store
    public function BrandProcess(Request $request)
    {
       
        //imge validation
        if ($request->post('id')>0) {
            $imageValidation = '|mimes:jpeg,jpg,png';
        }else{
             $imageValidation = 'required|mimes:jpeg,jpg,png';
        }

        $request->validate([
            'image'=> $imageValidation,
            'brand'=>'required|unique:brands,brand,'.$request->post('id'),

        ]);

        if ($request->post('id')>0) {

            $id    = $request->post('id');
            $model = Brand::find($id);
            $msg   = "Brand Updated Successfull !";
            
        }else{

            $model = new Brand();
            $msg   = "Brand Insert Successfull !";
        }

        //imge uploade 
        if ($request->hasfile('image')) {
            
            if ($request->post('id')>0) {

                $ArrImage = DB::table('brands')->where(['id'=>$request->post('id')])->get();
                // echo "<pre>";
                // print_r($ArrImage);die();
                if (Storage::exists('/public/media/'.$ArrImage[0]->image)) {

                     Storage::delete('/public/media/'.$ArrImage[0]->image);

                    }
                }

            $image = $request->file('image');
            $ext   = $image->extension();
            $imageName = time().'id'.$request->post('id').'.'.$ext;
            $image->storeAs('/public/media/Brand',$imageName);
            $model->image = 'Brand/'.$imageName;
        }

        $model->brand = $request->post('brand');
        $model->is_home = $request->post('is_home');
        $model->is_home = 0;
        if ($request->post('is_home') !== null) {
             $model->is_home = 1;
        }

        $model->save();

        $request->session()->flash('message',$msg);
        return redirect()->route('brand');


    }

//brand delete
    public function Delete(Request $request,$id)
        {

            $model = Brand::find($id);
            $model->delete();

            $request->session()->flash('warning','Brand Delete Successfull !');
            return redirect()->route('brand');
        }


///brand status updated
    public function Status(Request $request,$status,$id)
        {

            $model = Brand::find($id);
            $model->status = $status;
            $model->save();

            $request->session()->flash('message','Brand Status Update Successfull !');
            return redirect()->route('brand');

        }

}
