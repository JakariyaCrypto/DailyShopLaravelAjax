<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Storage;
use Crypt;
use Mail;
class frontController extends Controller
{

    public function index()
    	{	

    		//categorys show
    		$result['home_categories'] = DB::table('categories')
					->where(['status' => 'Active'])
					->where(['is_home' => 1])
					->get();	

					$products = DB::table('products')
					->where(['status' => 'Active'])
					->get();
					// prx($products[0]->id);exit;

					//categorys by product show
					foreach ($result['home_categories'] as $list) {
						$result['home_categorie_products'][$list->id] = DB::table('products')
							->where(['status'=>'Active'])
							->where([
								'category_id'=>$list->id,
								'is_discounted'=>0,
								'is_featured'=>0,
								'is_promo'=>0,
							])
							->orderBy('desc')
							->get();

							//product by product attributes show
							foreach ($result['home_categorie_products'][$list->id] as $list1 ) {
								$result['home_products_attr'][$list1->id] =  DB::table('product_attrs')
									->leftJoin('sizes','sizes.id','=','product_attrs.size_id')
									->leftJoin('colors','colors.id','=','product_attrs.color_id')
									->where([
										'product_attrs.product_id'=>$list1->id
									])
									->get();
							}

							// prx($result['home_products_attr']);
					}
					

			//brands get
    		$result['home_brands'] = DB::table('brands')
					->where(['status' => 'Active'])
					->where(['is_home' => 1])
					->get();	

			//get featured,discount,tranding products
			$result['home_featured_products'][$list->id] = DB::table('products')
						->where(['status'=>'Active'])
						->where(['is_featured'=>1])
						->get();

						//product by product attributes show
						foreach ($result['home_featured_products'][$list->id] as $list1 ) {
							$result['home_featured_products_attr'][$list1->id] =  DB::table('product_attrs')
								->leftJoin('sizes','sizes.id','=','product_attrs.size_id')
								->leftJoin('colors','colors.id','=','product_attrs.color_id')
								->where(['product_attrs.product_id'=>$list1->id])
								->get();
						}

			$result['home_discounted_products'][$list->id] = DB::table('products')
						->where(['status'=>'Active'])
						->where(['is_discounted'=>1])
						->get();

						//product by product attributes show
						foreach ($result['home_discounted_products'][$list->id] as $list1 ) {
							$result['home_discounted_products_attr'][$list1->id] =  DB::table('product_attrs')
								->leftJoin('sizes','sizes.id','=','product_attrs.size_id')
								->leftJoin('colors','colors.id','=','product_attrs.color_id')
								->where(['product_attrs.product_id'=>$list1->id])
								->get();
						}

			$result['home_tranding_products'][$list->id] = DB::table('products')
						->where(['status'=>'Active'])
						->where(['is_tranding'=>1])
						->get();

						//product by product attributes show
						foreach ($result['home_tranding_products'][$list->id] as $list1 ) {
							$result['home_tranding_products_attr'][$list1->id] =  DB::table('product_attrs')
								->leftJoin('sizes','sizes.id','=','product_attrs.size_id')
								->leftJoin('colors','colors.id','=','product_attrs.color_id')
								->where(['product_attrs.product_id'=>$list1->id])
								->get();
						}

					// 		echo "<pre>";
					// print_r($result);die();

			//categorys show
    		$result['home_banners'] = DB::table('banners')
					->where(['status' => 'Active'])
					->where(['is_home' => 1])
					->get();


    		return view('Frontend.Pages.index',$result);

    	}
    	
//get product detial page
	public function Product(Request $request,$slug)
    	{

    		$result['products'] = DB::table('products')
					->where(['status'=>'Active'])
					->where(['slug'=>$slug])
					->get();

			//product by product attributes show
			foreach ($result['products'] as $list1 ) {
				$result['products_attr'][$list1->id] =  DB::table('product_attrs')
					->leftJoin('sizes','sizes.id','=','product_attrs.size_id')
					->leftJoin('colors','colors.id','=','product_attrs.color_id')
					->where(['product_attrs.product_id'=>$list1->id])
					->get();
			}

			//product by product multi images show
			foreach ($result['products'] as $list1 ) {
				$result['product_images'][$list1->id] =  DB::table('product_images')
					->where(['product_images.products_id'=>$list1->id])
					->get();
			}

						
			$result['related_products'] = DB::table('products')
			->where(['status'=>'Active'])
			->where('slug','!=',$slug)
			->where(['category_id'=>$result['products'][0]->category_id])
			->get();
			//product by product attributes show
			foreach ($result['related_products'] as $list1 ) {
				$result['related_products_attr'][$list1->id] =  DB::table('product_attrs')
					->leftJoin('sizes','sizes.id','=','product_attrs.size_id')
					->leftJoin('colors','colors.id','=','product_attrs.color_id')
					->where(['product_attrs.product_id'=>$list1->id])
					->get();
			}
			// echo "<pre>";
			// print_r($result);die();
    		return view('Frontend.Pages.product_detail',$result);
    	}
 //add to cart
    public function addToCart(Request $request)
    	{
    		
    		if ($request->session()->has('FRONT_USER_LOGIN')) {

    			$uid = $request->session()->get('FRONT_USER_ID');
    			
    			$user_type = "reg";
    		}else{
    			$uid = getUseTemId();
    			$user_type = "not-reg";
    		}
    		//its data gotten by ajax post request
    		$size = $request->post('size_id');
    		$color = $request->post('color_id');
    		$pqty = $request->post('pqty');
    		$product_id = $request->post('product_id');
    		//its data gotten by ajax post request

    		//get size and color products by their id
    		$result = DB::table('product_attrs')
    			->select('product_attrs.id')
				->leftJoin('sizes','sizes.id','=','product_attrs.size_id')
				->leftJoin('colors','colors.id','=','product_attrs.color_id')
				->where(['product_id'=>$product_id])
				->where(['sizes.size'=>$size])
				->where(['colors.color'=>$color])
				->get();
				$product_attr_id = $result[0]->id;

				//check cart product 
				$check = DB::table('carts')
				->where(['product_id'=>$product_id])
				->where(['user_id'=>$uid])
				->where(['user_type'=>$user_type])
				->where(['product_attr_id'=>$product_attr_id])
				->get();
				// prx($check[0]->product_id);
				if (isset($check[0])) {
					$cart_id = $check[0]->id;
					if ($pqty == 0) {
						DB::table('carts')
					->where(['id'=>$cart_id])
					->delete();

					$del_msg = 'Your Cart Product is Deleted ';
					// return response()->json(['status'=>'error','msg'=>$msg]);
					return response()->json(['status'=>'del','del_msg'=>$del_msg]);
					}else{
						$product_id = $check[0]->product_id;
						DB::table('carts')
						->where(['id'=>$cart_id])
						->where(['product_id'=>$product_id])
						->update(['qty'=>$pqty]);

					$msg = 'Your Cart Product is Updated';
					}
					
				}else{
					//product addd to cart
					$check = DB::table('carts')->insertGetId([
						'product_id'=>$product_id,
						'user_id'=>$uid,
						'user_type'=>$user_type,
						'product_attr_id'=>$product_attr_id,
						'qty'=>$pqty,
						'added_on'=>date('Y-m-d h:i:s'),
					]);
					$msg = 'Product is Added to Cart';

				}

				$result = DB::table('carts')
    			->leftJoin('products','products.id','=','carts.product_id')
    			->leftJoin('product_attrs','product_attrs.id','=','carts.product_attr_id')
    			->leftJoin('sizes','sizes.id','=','product_attrs.size_id')
				->leftJoin('colors','colors.id','=','product_attrs.color_id')
				->where(['user_id'=>$uid])
				->where(['user_type'=>$user_type])
				->select('carts.qty','products.name','products.image','products.slug','products.id as pid','sizes.size','colors.color','product_attrs.price','product_attrs.attr_image','product_attrs.id as attr_id')
				->get();

				

				return (['msg'=>$msg,'data'=>$result,'TotalItem'=>count($result)]);
    	}

/// all cart funtionlity 
   public function ProductCart(Request $request)
    	{

    		if ($request->session()->has('FRONT_USER_LOGIN')) {

    			$uid = $request->session()->get('FRONT_USER_ID');
    			$user_type = "reg";

    		}else{
    			$uid = getUseTemId();
    			$user_type = "not-reg";
    		}

    		$result['list'] = DB::table('carts')
    			->leftJoin('products','products.id','=','carts.product_id')
    			->leftJoin('product_attrs','product_attrs.id','=','carts.product_attr_id')
    			->leftJoin('sizes','sizes.id','=','product_attrs.size_id')
				->leftJoin('colors','colors.id','=','product_attrs.color_id')
				->where(['user_id'=>$uid])
				->where(['user_type'=>$user_type])
				->select('carts.qty','products.name','products.image','products.slug','products.id as pid','sizes.size','colors.color','product_attrs.price','product_attrs.attr_image','product_attrs.id as attr_id')
				->get();
// prx($result);


    		return view('Frontend.Pages.cart',$result,compact('result'));
    	}

///category page
   public function CategoryPage(Request $request,$slug)
   	{
   		//category sort by filtering js request get here
   		$sort = "";
   		$sort_txt = "";
   		$min_filter_price = "";
   		$max_filter_price = "";
   		$color_filter = "";
   		$colorFilterArr = [];

   		if ($request->get('sort') !== '') {
   			$sort = $request->get('sort');
   		}

   		//show left side categorys
    	$result['left_categories'] = DB::table('categories')
					->where(['status' => 'Active'])
					->get();
		//category by product show
		 $query = DB::table('products');
		$query = $query->leftJoin('categories','categories.id','=','products.category_id');
		$query = $query->leftJoin('product_attrs','product_attrs.product_id','=','products.id');
			$query = $query->where(['products.status'=>'Active']);
			//category sort by filtering
			$query = $query->where(['categories.category_slug'=>$slug]);
				if ($sort == 'name') {
					$query->orderBy('products.name','asc');
					$sort_txt = "product name";
				}
				if ($sort == 'date') {
					$query->orderBy('products.id','desc');
					$sort_txt = "date";
				}
				if ($sort == 'price_asc') {
					$query = $query->orderBy('product_attrs.price','asc');
					$sort_txt = "price-asc";

				}
				if ($sort == 'price_desc') {
					$query = $query->orderBy('product_attrs.price','desc');
					$sort_txt = "price-desc";

				}
				//price filtering 
				if ($request->get('min_filter_price') !== null && $request->get('max_filter_price') !== null) {
		   			$min_filter_price = $request->get('min_filter_price');
		   			$max_filter_price = $request->get('max_filter_price');
		   			
		   			if ($min_filter_price > 0 && $max_filter_price > 0) {
		   				$query = $query->whereBetween('product_attrs.price',[$min_filter_price,$max_filter_price]);
		   			}

		   		}// end price filtering 
		   		//color filtering
		   		if ($request->get('color_filter') !== null) {
		   			$color_filter = $request->get('color_filter');
		   			$colorFilterArr = explode(":", $color_filter);
		   			$colorFilterArr = array_filter($colorFilterArr);
					$query->where(['product_attrs.color_id'=> $request->get('color_filter')]);
					
				}//end color filtering

			//category sort by filtering
			$query = $query->distinct()->select(['products.*']);
			$query = $query->get();
			$result['products'] = $query;

			//product by product attributes show
			foreach ($result['products'] as $list1 ) {
				// print_r($list1->id);die();
				$query = DB::table('product_attrs');
					$query =$query = $query->leftJoin('sizes','sizes.id','=','product_attrs.size_id');
					$query = $query->leftJoin('colors','colors.id','=','product_attrs.color_id');
					$query = $query->where(['product_attrs.product_id'=>$list1->id]);
					
					$query = $query->get();
					//prx($query);
					$result['products_attr'][$list1->id] = $query;
			}

			///get all colort for category page 
			$result['colors'] = DB::table('colors')
					->where(['status' => 'Active'])
					->get();

			$result['sort'] = $sort;
			$result['sort_txt'] = $sort_txt;
			$result['min_filter_price'] = $min_filter_price;
			$result['max_filter_price'] = $max_filter_price;
			$result['color_filter'] = $color_filter;
			$result['colorFilterArr'] = $colorFilterArr;
			
   		return view('Frontend.Pages.category_product',$result);
   	} 

///product search 
   	public function Search(Request $request,$str)
   		{
   			$result['products'] =
			//category by product show
		 $query = DB::table('products');
		$query = $query->leftJoin('categories','categories.id','=','products.category_id');
		$query = $query->leftJoin('product_attrs','product_attrs.product_id','=','products.id');
			$query = $query->where(['products.status'=>'Active']);
					$query = $query->where('name','like',"%$str%");
					$query = $query->orwhere('model','like',"%$str%");
					$query = $query->orwhere('short_desc','like',"%$str%");
					$query = $query->orwhere('desc','like',"%$str%");
					$query = $query->orwhere('technical_specification','like',"%$str%");
					$query = $query->orwhere('keyword','like',"%$str%");
					$query = $query->orwhere('uses','like',"%$str%");
					$query = $query->orwhere('lead_time','like',"%$str%");
					$query = $query->orwhere('name','like',"%$str%");
					$query = $query->orwhere('name','like',"%$str%");
					$query = $query->orwhere('name','like',"%$str%");
					$query = $query->orwhere('name','like',"%$str%");
			//category sort by filtering
			$query = $query->distinct()->select(['products.*']);
			$query = $query->get();
			$result['products'] = $query;

			//product by product attributes show
			foreach ($result['products'] as $list1 ) {
				// print_r($list1->id);die();
				$query = DB::table('product_attrs');
					$query =$query = $query->leftJoin('sizes','sizes.id','=','product_attrs.size_id');
					$query = $query->leftJoin('colors','colors.id','=','product_attrs.color_id');
					$query = $query->where(['product_attrs.product_id'=>$list1->id]);
					
					$query = $query->get();
					//prx($query);
					$result['products_attr'][$list1->id] = $query;
			}

    		return view('Frontend.Pages.search',$result);

   		}

//registration view
   	public function Registraion(Request $request)
   		{
   			return view('Frontend.Pages.ragistration');
   		}

//registration process
   	public function RegistraionProcess(Request $request)
   		{
   			$valid = Validator::make($request->all(),[
   				'name'=>'required',
   				'email'=>'required|email|unique:customers,email',
   				'password'=>'required|min:6|max:20',
   				'mobile'=>'required|numeric|digits:11|unique:customers,mobile',
   			]);

   			if (!$valid->passes()) {
   				return response()->json(['status'=>'error','error'=>$valid->errors()->toArray()]);
   			}else{
   				$rand_id = rand(111111111,999999999);
   				$arr = [
   					'name'=>$request->name,
   					'email'=>$request->email,
   					'password'=>Crypt::encrypt($request->password),
   					'mobile'=>$request->mobile,
   					'rand_id'=>$rand_id,
   					'is_verify'=>0,
   					'created_at'=>date('Y-m-d h:i:s'),
   					'updated_at'=>date('Y-m-d h:i:s'),

   				];

   				$insert = DB::table('customers')->insert($arr);
   				
   				if ($insert) {

   					$data = ['name'=>$request->name,'rand_id'=>$rand_id];
   					$user['to'] = $request->email;
   					Mail::send('Frontend/Pages/email_verify_temp',$data,function($messages) use ($user){
   						$messages->to($user['to']);
   						$messages->subject('E-mail Verification');

   					}); 

   					return response()->json(['status'=>'success','msg'=>'Registration Successfull And Check your email for verify account']);
   				}
   			}
   		}
 //login    akddosali935605@gmail.com
   	public function LoginProcess(Request $request)
   		{
   			//get customer by valid email id
   			$result = DB::table('customers')
   				->where(['email'=>$request->login_email])
   				->get();

   				if (isset($result[0])) {
   					$db_pwd = Crypt::decrypt($result[0]->password);
   					$is_verify = $result[0]->is_verify;
   					$status = $result[0]->status;

   					if ($is_verify == 0) {
   						$msg = "Please ! verify your email";
   						return response()->json(['status'=>'error','msg'=>$msg]);
   					}
   					if ($status == 'user') {
   						$msg = "Your Accoutn is Deactived !";
   						return response()->json(['status'=>'error','msg'=>$msg]);
   					}

   					if ($db_pwd == $request->login_password) {
   							
   						if ($request->rememberme === null) {
   							setcookie('login_email',$request->login_email,100);
   							setcookie('login_password',$request->login_password,100);
   						}else{
   							setcookie('login_email',$request->login_email,time()+60*60*24*100);
   							setcookie('login_password',$request->login_password,time()+60*60*24*100);
   						}

   						$request->session()->put('FRONT_USER_LOGIN',true);
   						$request->session()->put('FRONT_USER_ID',$result[0]->id);
   						$request->session()->put('FRONT_USER_NAME',$result[0]->name);

   						$msg = "";
   						$getUseTemId = getUseTemId();
   						DB::table('carts')
			   				->where(['user_id'=>$getUseTemId,'user_type'=>'not-reg'])
			   				->update(
			   					[
			   						'user_id'=>$result[0]->id,
			   						'user_type'=>'reg',
			   					]
			   				);

   						return response()->json(['status'=>'success','msg'=>$msg]);
   						//update carts user status
   						
   					}else{
   						$msg = "Your Password is Wrong !";
   						return response()->json(['status'=>'error','msg'=>$msg]);
   					}	
   				}
   				else{
   					
   					$msg = "Your E-mail Adress is Wrong !";
   					return response()->json(['status'=>'error','msg'=>$msg]);
   				}
   				
   		}

//email verificaton 
   	public function EmailVerification(Request $request,$rand_id)
   		{
   			$result = DB::table('customers')
   				->where(['rand_id'=>$rand_id])
   				->where(['is_verify'=>0])
   				->get();

   				if (isset($result[0])) {
   					DB::table('customers')
	   				->where(['id'=>$result[0]->id])
	   				->update(['is_verify'=>1,'rand_id'=>'']);
	   				return view('Frontend.Pages.email_verify_success');
   				}else{
   					return redirect()->route('index');
   				}

   		}

 //forgot password
   	public function ForgotPassword(Request $request)
   		{
   			//get customer by valid email id
   			$result = DB::table('customers')
   				->where(['email'=>$request->forgot_email])
   				->get();
   				$rand_id = rand(111111111,999999999);
   				if (isset($result[0])) {
   					DB::table('customers')
	   				->where(['email'=>$request->forgot_email])
	   				->update(['is_forgot_password'=>1,'rand_id'=>$rand_id]);

   					$data = ['name'=>$result[0]->name,'rand_id'=>$rand_id];
   					$user['to'] = $request->forgot_email;
   					Mail::send('Frontend/Pages/forgot_temp',$data,function($messages) use ($user){
   						$messages->to($user['to']);
   						$messages->subject('Fotgot Password');
   						return response()->json(['status'=>'success','msg'=>'Please Check E-mai for change password']);
   					}); 

   				}else{
   					$msg = "Your E-mail Adress is Wrong !";
   					return response()->json(['status'=>'error','msg'=>$msg]);
   				}
   		}

//change password 
   	public function ChangeForgotPassword(Request $request,$rand_id)
   		{
   			$result = DB::table('customers')
   				->where(['rand_id'=>$rand_id])
   				->where(['is_verify'=>1])
   				->get();

   				if (isset($result[0])) {
   					$request->session()->put('FORGOT_PASS_USER_ID',$result[0]->id);
	   				return view('Frontend.Pages.chage_forgot_password');
   				}else{
   					return redirect()->route('index');
   				}

   		}

//create new password
   	public function CreateNewPasswordProcess(Request $request)
   		{
			DB::table('customers')
			->where(['id'=>$request->session()->get('FORGOT_PASS_USER_ID')])
			->update(
				[
					'is_forgot_password'=>0,
					'password'=>Crypt::encrypt($request->password),
					'rand_id'=>'',
				]
			);

		return response()->json(['status'=>'success','msg'=>'Password Updated']);

   		}
///checkout the cart prduct
   	public function Checout(Request $request)
   		{
   			$result['data'] = getCartTotalItem();
   			// prx($result['data']);
   			if (isset($result['data'][0])) {
   				if ($request->session()->has('FRONT_USER_LOGIN')) {
	    			$uid = $request->session()->get('FRONT_USER_ID');
					$customer_info = DB::table('customers')
		   				->where(['id'=>$uid])
		   				->get();
		   				//get acive coupon
		   				$activeCoupon = DB::table('cupons')->get();    
		   				// prx($customer_info);
		   				$result['customer']['name'] = $customer_info[0]->name;	
		   				$result['customer']['email'] = $customer_info[0]->email;	
		   				$result['customer']['mobile'] = $customer_info[0]->mobile;	
		   				$result['customer']['adress'] = $customer_info[0]->adress;	
		   				$result['customer']['city'] = $customer_info[0]->city;	
		   				$result['customer']['state'] = $customer_info[0]->state;	
		   				$result['customer']['zip'] = $customer_info[0]->zip;	
		   				$result['customer']['company'] = $customer_info[0]->company;	
		   				$result['customer']['coupon_code'] = $activeCoupon[0]->code;	
	    		}else{
	    			$result['customer']['name'] = '';
		   				$result['customer']['email'] = '';
		   				$result['customer']['mobile'] = '';
		   				$result['customer']['adress'] = '';	
		   				$result['customer']['city'] = '';
		   				$result['customer']['state'] ='';

		   				$result['customer']['zip'] = '';
		   				$result['customer']['company'] = '';
		   				$result['customer']['coupon_code'] = '';
	    		}

   			return view('Frontend.Pages.chackout',$result);

   			}else{
   				return redirect()->route('index');
   			}
   		}
//apply cupon code
   	public function ApplyCuponCode(Request $request)
   		{ 
   			//from common class
   			$arr = apply_cupon_code($request->cupon_code);	
   			$arr = json_decode($arr,true);
   			// prx($arr);
   				return response()->json(['status'=>$arr['status'],'msg'=>$arr['msg'],'totalPrice'=>$arr['totalPrice']]);
   				
	}

//remove coupon code
	public function RemoveCuponCode(Request $request)
		{
			
   			$result = DB::table('cupons')
   				->where(['code'=>$request->cupon_code])
   				->get();

   				$getCartTotalItem = getCartTotalItem();
				$totalPrice = 0;

				foreach ($getCartTotalItem as $list) {
					$totalPrice = $totalPrice+($list->qty * $list->price);
				
				}

			return response()->json(['status'=>'success','msg'=>'Coupon Code Removed !','totalPrice'=>$totalPrice]);
		}

//Place order 
	public function PlaceOrder(Request $request)
		{
			// prx($request->cupon_code);
			$payment_url = '';
			$valid = Validator::make($request->all(),[
   				'name'=>'required',
   				'country'=>'required',
   				'address'=>'required',
   				'city'=>'required',
   				'state'=>'required',
   				'zip'=>'required|numeric',
   				'email'=>'required|email',
   				'mobile'=>'required|numeric|digits:11',
   			]);

   			if (!$valid->passes()) {
   				return response()->json(['status'=>'valid_error','valid_error'=>$valid->errors()->toArray()]);
   			}

			if ($request->session()->has('FRONT_USER_LOGIN')) {
				$coupon_value = 0;
				if ($request->cupon_code !== '') {
					$arr = apply_cupon_code($request->cupon_code);	
   					$arr = json_decode($arr,true);

   					if ($arr['status'] == 'success') {
   						// prx($arr['coupon_code_value']);
   						$coupon_value = $arr['coupon_code_value'];
   					}else{
   						return response()->json(['status'=>'error','msg'=>$arr['msg']]);
   					}
				}
    			$uid = $request->session()->get('FRONT_USER_ID');
    			$getCartTotalItem = getCartTotalItem();
    			// prx($getCartTotalItem);
				$totalPrice = 0;
				foreach ($getCartTotalItem as $list) {
					$totalPrice = $totalPrice+($list->qty * $list->price);
				
				}

    			$arr = [
    				'customer_id' => $uid,
    				'name' => $request->name,
    				'email' => $request->email,
    				'mobile' => $request->mobile,
    				'country' => $request->country,
    				'address' => $request->address,
    				'company' => $request->company,
    				'city' => $request->city,
    				'state' => $request->state,
    				'zip' => $request->zip,
    				'coupon_code' => $request->cupon_code,
    				'coupon_value' => $coupon_value,
    				'payment_type' => $request->payment_type,
    				'payment_status' => "Pending",
    				'order_status' => 1,
    				'total_amount' => $totalPrice,
    			];

    			$orderId = DB::table('orders')->insertGetId($arr);
    			$request->session()->put('ORDER_ID',$orderId);
    			// echo $query;
    			if ($orderId > 0) {
    				foreach ($getCartTotalItem as $list) {
						$totalPrice = $totalPrice+($list->qty * $list->price);
						$productDetailArr['order_id'] = $orderId;
						$productDetailArr['product_id'] = $list->pid;
						$productDetailArr['product_attr_id'] = $list->pid;
						$productDetailArr['product_id'] = $list->attr_id;
						$productDetailArr['qty'] = $list->qty;
						$productDetailArr['price'] = $list->price;
						 DB::table('order_details')->insert($productDetailArr);

					}
					///online payment gateway
					if ($request->payment_type == 'Gateway') {
						if ($coupon_value !== '') {
							$finalPrice = $coupon_value;
						}else{
							$finalPrice = $totalPrice;
						}
						$ch = curl_init();

					    curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
					    curl_setopt($ch, CURLOPT_HEADER, FALSE);
					    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
					    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
					    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
					    curl_setopt($ch, CURLOPT_HTTPHEADER,
					                array("X-Api-Key:test_f8e273e7cbb01aa7cd24f73e0d4",
					                      "X-Auth-Token:test_bad0f907c266d00fbcd4da6461f"));
					    $payload = Array(
					        'purpose' => 'Buy Product',
					        'amount' => $finalPrice,
					        'phone' => '9999999999',
					        'buyer_name' => $request->name,
					        'redirect_url' => 'http://127.0.0.1:8000/redirect_pay_success/',
					        'send_email' => true,
					        'webhook' => 'http://www.example.com/webhook/',
					        'send_sms' => true,
					        'email' => $request->email,
					        'allow_repeated_payments' => false
					    );
					    curl_setopt($ch, CURLOPT_POST, true);
					    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
					    $response = curl_exec($ch);
					    curl_close($ch); 

					    $response = json_decode($response);

					    $payment_url = $response->payment_request->longurl;

					    return response()->json(['status'=>'pay_succes','payment_url'=>$payment_url]);
					}
					//end online payment gateway

					DB::table('carts')->where(['user_id'=>$uid,'user_type'=>'Reg'])->delete();
					$status = 'success';
					$msg = 'Order Place successfully';
    			}else{
    				return response()->json(['status'=>'error','msg'=>'Please Someting Wrong !']);
    			}
    			
    		}else{
    			return response()->json(['status'=>'error','msg'=>'Please Loign Then Try to Order']);
    		}
    		return response()->json(['status'=>'success','msg'=>$msg]);

		}
//redirect to customer when payment is success
	public function RedirectPaySuccess(Request $request)
		{

			if($request->get('payment_status') !== null && $request->get('payment_status') !== null && $request->get('payment_request_id') !== null){
				
				if ($request->get('payment_status') == 'Credit') {
					$status = "Success";
				}else{
					$status = "Fail";
				}
				//update order by trx id
				DB::table('orders')->where(['trx_id'=>$request->get('payment_request_id')])->update(['payment_status'=>$request->get('payment_status'),'trx_id'=>$request->get('payment_request_id'),'payment_id'=>$request->get('payment_id')]);
				return redirect()->route('order.success');

			}else{
				echo "order is empty";
			}
		}
//order success
	public function OrderSuccess(Request $request)
		{
			if ($request->session()->has('ORDER_ID')) {
				return view('Frontend.Pages.order_succes');
			}else{
				return redirect('/');
			}
		}
///my account view
	public function myAccount(Request $request){

		$result['orders'] = DB::table('orders')
			->where(['orders.customer_id'=>$request->session()
			->get('FRONT_USER_ID')])->get();
			// prx($result);
		return view('Frontend.My_account.my_account',$result);
	} //my account view end

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
			return view('Frontend.My_account.order-detail',$result);
		}

//insert rating

	public function addRating(Request $request,$rating){
		//input field validation
		$valid = Validator::make($request->all(),[
			'email'=>'required',
			'comment'=>'required|max:400',
		]);

		if (!$valid->passes()) {
			$status = 'errors';
			return response()->json(['status'=>$status,'errors'=>$valid->errors()->toArray()]);
		}

		$ratingArr = [
			'product_id'=>$request->post('product_id'),
			'email'=>$request->post('email'),
			'comment'=>$request->post('comment'),
			'rating'=>$rating,
			'customer_name'=> $request->session()->get('FRONT_USER_NAME'),
		];

		$ratingInsert = DB::table('ratings')->insert($ratingArr);

		if ($ratingInsert) {
			$msg = 'Your Review Successfully Added ! ';
			return response()->json(['status'=>'success','msg'=>$msg]);
		}
	}

//show product id by all review
	public function showReview(Request $request,$product_id){
		// return $product_id;
		//get single products rating
		$allRating = DB::table('ratings')
			->where(['product_id'=>$product_id])
			->orderBy('id','desc')
			->get(); //get single products rating

		//get single product total rating
		$totalRating = DB::table('ratings')
			->where('product_id',$product_id)
			->count(); //get single product total rating

		return response()->json(['ratings'=>$allRating,'total_rating'=>$totalRating]);

	}


}
