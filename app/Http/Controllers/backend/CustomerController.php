<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\backend\Customer;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
	//show customer table page
    public function Customer()
    	{

    		$result = Customer::all();
       		return view('Admin.Dashboard.customer',compact('result'));

    	}
// show customer detail
	public function ShowCustomer(Request $request,$id)
		{

			$arr = Customer::where(['id'=>$id])->get();
			$result['customers'] = $arr['0'];
			return view('Admin.Dashboard.customer_show',$result);

		}


//delete customer by admin
	public function Delete(Request $request,$id)
		{

			$model = Customer::find($id);
			$model->delete();

			$request->session()->flash('warning','Customer Delete Successfully !');
			return redirect()->route('customer');
		}

}
