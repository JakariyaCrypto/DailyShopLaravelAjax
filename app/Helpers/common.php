<?php
use Illuminate\Support\Facades\DB;
	function prx($arr)
		{
			echo "<pre>";
			print_r($arr);
			die();
		}

	function getTopNavCat()
		{
			$result = DB::table('categories')
					->where(['status' => 'Active'])
					->get();
					// prx($result);
					$arr = [];
			foreach ($result as $row ) {
				$arr[$row->id]['city'] = $row->category_name;
				$arr[$row->id]['parent_id'] = $row->parent_category_id;
			}

			$str = buildTreeView($arr,0);
			return $str;

		}

	$html='';
	function buildTreeView($arr,$parent,$level=0,$prelevel=-1)
		{
			global $html;
			foreach ($arr as $id => $data) {
				if ($parent==$data['parent_id']) {
					if($level>$prelevel){
						if ($html=='') {
							$html.='<ul class="nav navbar-nav"';
						}else{
							$html.='<ul class="dropdown-menu">';
						}
					}
					if ($level==$prelevel) {
					$html.='</li>';
					}
					$html.='<li><a href="#">'.$data['city'].'<span class="caret"></span></a>';
					if ($level>$prelevel) {
						$prelevel=$level;
					}

					$level++;
					buildTreeView($arr,$id,$level,$prelevel);
					$level--;
				}
		}
		

		if ($level==$prelevel) {
			$html.='</li></ul>';
		}
		return $html;
	}
///end menu

//start temporary use by randomly
	function getUseTemId()
		{
			if (!session()->has('TEMP_USER_ID')) {
				
				$rand = rand(111111111,999999999);

				session()->put('TEMP_USER_ID',$rand);
				return $rand;

			}else{

				return session()->get('TEMP_USER_ID');

			}
		}
//get total cart product item
	function getCartTotalItem()
		{
			if (session()->has('FRONT_USER_LOGIN')) {

    			$uid = session()->get('FRONT_USER_ID');
    			$user_type = "Reg";

    		}else{
    			$uid = getUseTemId();
    			$user_type = "Not-Reg";
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
				return $result;
		}

///apply coupon code
	function apply_cupon_code($cupon_code)
		{
			$totalPrice = 0;
   			$result = DB::table('cupons')
   				->where(['code'=>$cupon_code])
   				->get();
   				// prx($result);
   				
   				if (isset($result[0])) {
   					$value = $result[0]->value;
   					$type = $result[0]->type;
   					if ($result[0]->status == 'Active') {
   						if ($result[0]->is_one_time == 1) {
   							$status = 'error';
   							$msg = 'Coupon Code is already used !';
   						}else{
   							$min_order_amt = $result[0]->min_order_amt;
   							if ($min_order_amt > 0) {
   								$getCartTotalItem = getCartTotalItem();
	   							$totalPrice = 0;

	   							foreach ($getCartTotalItem as $list) {
	   								$totalPrice = $totalPrice+($list->qty * $list->price);
	   							}

	   							if ($min_order_amt<$totalPrice) {
	   								$status = 'success';
   									$msg = 'Coupon Code Applied !';
	   							}else{
	   								$status = 'error';
   									$msg = 'Amount Should be grater than';
	   								return response()->json(['status'=>'error','msg'=>$msg.' '.$min_order_amt.' '.'Tk']);
	   							}

   							}else{
   								$status = 'success';
   								$msg = 'Coupon Code Applied !';
   							}
   							
   							// echo $totalPrice;
   							// die();newCupon11
   						}
   						
   					}else{
   						$status = 'error';
						$msg = 'Coupon code id Inactived';
   					}
   					
   				}else{
   					$status = 'error';
					$msg = 'Please Enter Valid Coupon Code';
   				}

   				$coupon_code_value = 0;
   				if ($status == 'success') {
   					if ($type == 'value') {
   						$totalPrice = $totalPrice - $value;
   						$coupon_code_value = $totalPrice;
   					}
   					if ($type == 'per') {
   						$newPrice = ($value/100) * $totalPrice;
   						$totalPrice = $totalPrice - $newPrice;
   						$coupon_code_value = $totalPrice;
   					}
   				}

   				return json_encode(['status'=>$status,'msg'=>$msg,'totalPrice'=>$totalPrice,'coupon_code_value'=>$coupon_code_value]);
		}








?>