<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Banner;
use Illuminate\Support\Facades\DB;
use Storage;
class BannerController extends Controller
{
   //Banner table page show
    public function Banner()
    {
        $result = Banner::all();
        return view('Admin.Dashboard.banner',compact('result'));

    }

//show Banner insert form page 
    public function manageBanner($id='')
    {

        if($id>0){
            $arr = Banner::where(['id'=>$id])->get();
            $result['title'] = $arr['0']->title;
            $result['save_up'] = $arr['0']->save_up;
            $result['short_desc'] = $arr['0']->short_desc;
            $result['link'] = $arr['0']->link;
            $result['button'] = $arr['0']->button;
            $result['is_home'] = $arr['0']->is_home;
            $result['image'] = $arr['0']->image;
            $result['is_home_select'] = "";
            if ($arr['0']->is_home ==1) {
                $result['is_home_select'] = "checked";
            }

            $result['id'] = $arr['0']->id;

        }else{
            $result['title'] = '';
            $result['save_up'] = '';
            $result['short_desc'] = '';
            $result['link'] = '';
            $result['button'] = '';
            $result['is_home'] = '';
            $result['is_home_select'] = '';
            $result['image'] = '';
            $result['id'] = 0;
        }


        return view('Admin.Dashboard.manage_banner', $result);

    }

//Banner store
    public function BannerProcess(Request $request)
    {
       
        //imge validation
        if ($request->post('id')>0) {
            $imageValidation = '|mimes:jpeg,jpg,png';
        }else{
             $imageValidation = 'required|mimes:jpeg,jpg,png';
        }

        $request->validate([
            'image'=> $imageValidation,
            'title'=>'required|unique:banners,title,'.$request->post('id'),
            'save_up'=>'required',
            'short_desc'=>'required',
            'link'=>'required',
            'button'=>'required',

        ]);

        if ($request->post('id')>0) {

            $id    = $request->post('id');
            $model = Banner::find($id);
            $msg   = "Banner Updated Successfull !";
            
        }else{

            $model = new Banner();
            $msg   = "Banner Insert Successfull !";
        }

        //imge uploade 
        if ($request->hasfile('image')) {
            
            if ($request->post('id')>0) {

                $ArrImage = DB::table('banners')->where(['id'=>$request->post('id')])->get();
                // echo "<pre>";
                // print_r($ArrImage);die();
                if (Storage::exists('/public/media/'.$ArrImage[0]->image)) {

                     Storage::delete('/public/media/'.$ArrImage[0]->image);

                    }
                }

            $image = $request->file('image');
            $ext   = $image->extension();
            $imageName = time().'id'.$request->post('id').'.'.$ext;
            $image->storeAs('/public/media/Banner',$imageName);
            $model->image = 'Banner/'.$imageName;
        }

        $model->title = $request->post('title');
        $model->save_up = $request->post('save_up');
        $model->short_desc = $request->post('short_desc');
        $model->link = $request->post('link');
        $model->button = $request->post('button');
        $model->is_home = $request->post('is_home');
        $model->is_home = 0;

        if ($request->post('is_home') !== null) {
             $model->is_home = 1;
        }

        $model->save();

        $request->session()->flash('message',$msg);
        return redirect()->route('banner');


    }

//Banner delete
    public function Delete(Request $request,$id)
        {

            $model = Banner::find($id);
            $model->delete();

            $request->session()->flash('warning','Banner Delete Successfull !');
            return redirect()->route('banner');
        }


///Banner status updated
    public function Status(Request $request,$status,$id)
        {

            $model = Banner::find($id);
            $model->status = $status;
            $model->save();

            $request->session()->flash('message','Banner Status Update Successfull !');
            return redirect()->route('banner');

        }
}
