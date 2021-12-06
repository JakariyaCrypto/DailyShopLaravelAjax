<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\backend\Category;
use Illuminate\Http\Request;
use Storage;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

// add category form view
    public function manageCategory($id='')
    {
        if($id>0){
            $arr = Category::where(['id'=>$id])->get();
            $result['category_name'] = $arr['0']->category_name;
            $result['parent_category_id'] = $arr['0']->parent_category_id;
            $result['category_slug'] = $arr['0']->category_slug;
            $result['is_home'] = $arr['0']->is_home;
            $result['is_home_select'] = "";

            if ($arr['0']->is_home ==1) {
                 $result['is_home_select'] = "checked";
            }

            $result['category_image'] = $arr['0']->category_image;
            $result['id'] = $arr['0']->id;

            //all category without updated selected by category
            $categorys['categorys'] = DB::table('categories')->where(['status'=>'Active'])->where('id','!=',$id)->get();

        }else{
            $result['category_name'] = '';
            $result['parent_category_id'] = '';
            $result['is_home'] = '';
            $result['category_image'] = '';
            $result['category_slug'] = '';
            $result['image'] = '';
            $result['is_home_select'] = "";
            $result['id'] = 0;

            //all category
            $categorys['categorys'] = DB::table('categories')->where(['status'=>'Active'])->get();

        }

        

        return view('Admin.Dashboard.manage_category',$result,$categorys);

    }

    // category show
    public function Category()
    {
        $result['data'] = Category::all();
        return view('Admin.Dashboard.category',$result);
        
    }

// categroy store
    public function categoryProcess(Request $request)
    {
        if ($request->post('id') > 0) {

           $image_validation = '|mimes:jpg,jpeg,png';

        }else{

            $image_validation = 'required|mimes:jpg,jpeg,png';

        }

        $request->validate([

            'category_name'=>'required',
            'category_image'=>$image_validation,
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id'),

        ]);

        if($request->post('id')>0){

            $model = Category::find($request->post('id'));
            $msg = "Category Updated";

        }else{

            $model = new Category();
            $msg = "Category Inserted";
        }

         // category imge uploade 
        if ($request->hasfile('category_image')) {
            
            if ($request->post('id')>0) {

                $ArrImage = DB::table('categories')->where(['id'=>$request->post('id')])->get();

                if ( Storage::exists('/public/media/'.$ArrImage[0]->category_image)) {

                     Storage::delete('/public/media/'.$ArrImage[0]->category_image);

                    }
                }
        //image insert
            $category_image = $request->file('category_image');
            $ext   = $category_image->extension();
            $imageName = time().'id'.$request->post('id').'.'.$ext;
            $category_image->storeAs('/public/media/CategoryImg/',$imageName);
            $model->category_image = 'CategoryImg/'.$imageName;
        }

        $model->category_name = $request->post('category_name');
        $model->parent_category_id = $request->post('parent_category_id');
        $model->category_slug = $request->post('category_slug');
        $model->is_home =0;

        if ($request->post('is_home') !==null) {
            $model->is_home = 1;
        }

        $model->save();
        $request->session()->flash('message',$msg);
        return redirect()->route(('category'));

    }

    // category delete
    public function delete(Request $request,$id){

        $model = Category::find($id);
        $model->delete();

        $request->session()->flash('warning','Category Deleted');
        return redirect('admin/category');
    }

// category status
public function status(Request $request,$status,$id){

    $model = Category::find($id);
    $model->status = $status;
    $model->save();

    $request->session()->flash('message','Category Status Updated');
    return redirect('admin/category');
}


}
