<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\backend\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
class ProductController extends Controller
{
//product table page show
    public function Product()
    {
        $result = Product::all();
        return view('Admin.Dashboard.product',compact('result'));

    }

//show product insert form page 
    public function manageProuct($id='')
    {

        if($id>0){
            $arr = Product::where(['id'=>$id])->get();
            $result['category_id'] = $arr['0']->category_id;
            $result['brand'] = $arr['0']->brand;
            $result['name'] = $arr['0']->name;
            $result['image'] = $arr['0']->image;
            $result['slug'] = $arr['0']->slug;
            $result['technical_specification'] = $arr['0']->technical_specification;
            $result['model'] = $arr['0']->model;
            $result['short_desc'] = $arr['0']->short_desc;
            $result['desc'] = $arr['0']->desc;
            $result['keyword'] = $arr['0']->keyword;
            $result['warranty'] = $arr['0']->warranty;
            $result['uses'] = $arr['0']->uses;
            $result['lead_time'] = $arr['0']->lead_time;
            $result['tax'] = $arr['0']->tax;
            $result['tax_id'] = $arr['0']->tax_id;
            $result['is_promo'] = $arr['0']->is_promo;
            $result['is_featured'] = $arr['0']->is_featured;
            $result['is_discounted'] = $arr['0']->is_discounted;
            $result['is_tranding'] = $arr['0']->is_tranding;
            $result['status'] = $arr['0']->status;
            $result['id'] = $arr['0']->id;

            // product id by product attributes get
             $result['product_att_arr'] = DB::table('product_attrs')->where(['product_id'=>$id])->get();

             // product id by product attributes get
             $product_images_arr = DB::table('product_images')->where(['products_id'=>$id])->get();

             if (!isset($product_images_arr[0])) {
                  $result['product_images_arr']['0']['id'] = '';
                  $result['product_images_arr']['0']['images'] = '';
             }else{
                $result['product_images_arr'] = $product_images_arr;
             }
             // echo '<pre>';
             // print_r($result['product_images_arr']);exit;
        }else{
            $result['category_id'] = '';
            $result['name'] = '';
            $result['image'] = '';
            $result['brand'] = '';
            $result['slug'] = '';
            $result['technical_specification'] = '';
            $result['model'] = '';
            $result['short_desc'] = '';
            $result['desc'] = '';
            $result['keyword'] = '';
            $result['warranty'] = '';
            $result['lead_time'] = '';
            $result['tax'] = '';
            $result['tax_id'] = '';
            $result['is_promo'] = '';
            $result['is_featured'] = '';
            $result['is_discounted'] = '';
            $result['is_tranding'] = '';
            $result['status'] = '';
            $result['uses'] = '';
            $result['id'] = 0;

            //product attributes

            $result['product_att_arr'][0]['id'] = '';
            $result['product_att_arr'][0]['product_id'] = '';
            $result['product_att_arr'][0]['size_id'] = '';
            $result['product_att_arr'][0]['color_id'] = '';
            $result['product_att_arr'][0]['sku'] = '';
            $result['product_att_arr'][0]['mrp'] = '';
            $result['product_att_arr'][0]['price'] = '';
            $result['product_att_arr'][0]['qty'] = '';
            $result['product_att_arr'][0]['image'] = '';
            //product images
            $result['product_images_arr']['0']['id'] = '';
            $result['product_images_arr']['0']['images'] = '';

        }
        // echo "<pre>";
        // print_r($result);die();
        //all category
        $categorys = DB::table('categories')->where(['status'=>'Active'])->get();
        //all brand
         $brands = DB::table('brands')->where(['status'=>'Active'])->get();
         //all brand
         $sizes = DB::table('sizes')->where(['status'=>'Active'])->get();
        //all brand
         $colors = DB::table('colors')->where(['status'=>'Active'])->get();
         //all tax
        $taxs = DB::table('taxes')->where(['status'=>'Active'])->get();

        return view('Admin.Dashboard.manage_product', $result,
            compact(
                'categorys','brands','sizes','colors','taxs'
             ));

    }

//product store
    public function ProductProcess(Request $request)
    {

        if ($request->post('id')>0) {

            $imageValidation = '|mimes:jpeg,jpg,png';

        }else{

             $imageValidation = 'required|mimes:jpeg,jpg,png';
             
        }

        $request->validate([

            'category_id'=>'required',
            'image'=> $imageValidation,
            'attr_image.*'=> 'mimes:jpeg,jpg,png',
            'images.*'=> 'mimes:jpeg,jpg,png',
            'name'=>'required',
            'brand'=>'required',
            'slug'=>'required|unique:products,slug,'.$request->post('id'),
            'technical_specification'=>'required',
            'model'=>'required',
            'short_desc'=>'required',
            'desc'=>'required',
            'keyword'=>'required',
            'warranty'=>'required',
            'uses'=>'required',

        ]);

        $paid_idArr = $request->post('paid');
        $size_idArr = $request->post('size_id');
        $color_idArr = $request->post('color_id');
        $skuArr = $request->post('sku');
        $mprArr = $request->post('mrp');
        $priceArr = $request->post('price');
        $qtyArr = $request->post('qty');

        foreach ($skuArr as $key => $val) {
            //check unique sku
           $check = DB::table('product_attrs')
                ->where('sku','=',$skuArr[$key])
                ->where('id','!=',$paid_idArr[$key])
                ->get();

                if (isset($check[0])) {
                    $request->session()->flash('sku_error',$skuArr[$key] . ' SKU Already used');
                    return redirect(request()->headers->get('referer'));
                }
        }


        if ($request->post('id')>0) {

            $id    = $request->post('id');
            $model = Product::find($id);
            $msg   = "Product Updated Successfull !";
            
        }else{

            $model = new Product();
            $msg   = "Product Insert Successfull !";
        }

        //imge uploade 
        if ($request->hasfile('image')) {

            if ($request->post('id')>0) {

                $ArrImage = DB::table('products')->where(['id'=>$request->post('id')])->get();

                if ( Storage::exists('/public/media/'.$ArrImage[0]->image)) {

                     Storage::delete('/public/media/'.$ArrImage[0]->image);

                    }
                }

                $image = $request->file('image');
                $ext   = $image->extension();
                $imageName = time().'id'.$request->post('id').'.'.$ext;
                $image->storeAs('/public/media',$imageName);
                $model->image = $imageName;
         }

        $model->category_id = $request->post('category_id');
        $model->brand = $request->post('brand');
        $model->name = $request->post('name');
        $model->slug = $request->post('slug');
        $model->model = $request->post('model');
        $model->short_desc = $request->post('short_desc');
        $model->desc = $request->post('desc');
        $model->technical_specification = $request->post('technical_specification');
        $model->keyword = $request->post('keyword');
        $model->warranty = $request->post('warranty');
        $model->uses = $request->post('uses');

        $model->lead_time = $request->post('lead_time');
        $model->tax = $request->post('tax');
        $model->tax_id = $request->post('tax_id');
        $model->is_promo = $request->post('is_promo');
        $model->is_featured = $request->post('is_featured');
        $model->is_discounted = $request->post('is_discounted');
        $model->is_tranding = $request->post('is_tranding');

        $model->save();
        $pid = $model->id;
 
        /*product attributes start */

        foreach ($skuArr as $key => $val) {
            $productAttArr = [];
            $productAttArr['product_id'] = $pid;

            if ($size_idArr[$key] == '') {
                $productAttArr['size_id'] = 0;
            }else{
                $productAttArr['size_id'] = $size_idArr[$key];
            }

            if ($color_idArr[$key] == '') {
                $productAttArr['color_id'] = 0;
            }else{
                $productAttArr['color_id'] = $color_idArr[$key];
            }

            $productAttArr['sku'] = $skuArr[$key];
            $productAttArr['mrp'] = $mprArr[$key];
            $productAttArr['price'] = $priceArr[$key];
            $productAttArr['qty'] = $qtyArr[$key];

             // $productAttArr['attr_image'] = 'test';

            if ($request->hasFile("attr_image.$key")) {

                if ($paid_idArr[$key] != '') {
                $paid = $paid_idArr[$key];
                $ArrImage = DB::table('product_attrs')->where(['id'=>$paid])->get();

                if ( Storage::exists('/public/media/'.$ArrImage[0]->attr_image)) {

                     Storage::delete('/public/media/'.$ArrImage[0]->attr_image);

                    }
                }

                $rand = rand('111111111','999999999');
                $attr_image = $request->file("attr_image.$key");
                $ext   = $attr_image->extension();
                $imageName = time().$rand.'.'.$ext;
                $request->file("attr_image.$key")->storeAs('/public/media/AttrImage',$imageName);
                $productAttArr['attr_image'] = 'AttrImage/'.$imageName;

            }

            // update product attributes
            if ($paid_idArr[$key] != '') {
                $paid = $paid_idArr[$key];
               DB::table('product_attrs')->where(['id'=>$paid])->update($productAttArr);

            }else{

                DB::table('product_attrs')->insert($productAttArr);

            }
            
        }
        /*product attributes end */


        /*product multi images start */
            $pImgsidArr = $request->post('pIid');
            foreach ($pImgsidArr as $key => $val) {
                    $productImagesArr['products_id'] = $pid;     //main product id
                    if ($request->hasFile("images.$key")) {

                    if ($pImgsidArr[$key] != '') {
                    $pImgsid = $pImgsidArr[$key];
                    $ArrImage = DB::table('product_images')->where(['id'=>$pImgsid])->get();

                    if ( Storage::exists('/public/media/'.$ArrImage[0]->images)) {

                         Storage::delete('/public/media/'.$ArrImage[0]->images);

                        }
                    }

                    $rand = rand('111111111','999999999');
                    $images = $request->file("images.$key");
                    $ext   = $images->extension();
                    $imageName = time().$rand.'.'.$ext;
                    $request->file("images.$key")->storeAs('/public/media/Multi_imgs',$imageName);
                    $productImagesArr['images'] = 'Multi_imgs/'.$imageName;

                }

                // update product attributes
                if ($pImgsidArr[$key] != '') {
                    $pImgsid = $pImgsidArr[$key];
                   DB::table('product_images')->where(['id'=>$pImgsid])->update($productImagesArr);

                }else{

                    DB::table('product_images')->insert($productImagesArr);

                }
            }
        /*product multi images end */
        $request->session()->flash('message',$msg);
        return redirect()->route('product');


    }

//product delete
    public function Delete(Request $request,$id)
        {

            $model = Product::find($id);
            $model->delete();

            $request->session()->flash('warning','Product Delete Successfull !');
            return redirect()->route('product');
        }


///product status updated
    public function Status(Request $request,$status,$id)
        {

            $model = Product::find($id);
            $model->status = $status;
            $model->save();

            $request->session()->flash('message','Product Status Update Successfull !');
            return redirect()->route('product');

        }

// product attributes detele
    public function ProductAttrDelete(Request $request,$paid,$pid)
        {

            $ArrImage = DB::table('product_attrs')->where(['id'=>$paid])->get();

            if ( Storage::exists('/public/media/'.$ArrImage[0]->attr_image)) {

                 Storage::delete('/public/media/'.$ArrImage[0]->attr_image);

            }
           
            DB::table('product_attrs')->where(['id'=>$paid])->delete();

            $request->session()->flash('message','Product Attributes Image Delete Successfull !');

            return redirect('admin/product/manage/product/'.$pid);

        }

// product attributes detele
    public function ProductImgsDelete(Request $request,$paid,$pid)
        {

            $ArrImage = DB::table('product_images')->where(['id'=>$paid])->get();

            if ( Storage::exists('/public/media/'.$ArrImage[0]->images)) {

                 Storage::delete('/public/media/'.$ArrImage[0]->images);

            }
           
            DB::table('product_images')->where(['id'=>$paid])->delete();

            $request->session()->flash('message','Product Attributes Image Delete Successfull !');

            return redirect('admin/product/manage/product/'.$pid);

        }



}










