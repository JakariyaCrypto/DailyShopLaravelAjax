@extends('Frontend/Includes/layout')
@section("page_title","Daily Shop | Checkout")

<!-- / menu -->

@section('content')
    <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="{{asset('Frontend/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Checkout Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Checkout</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form id="frmPlaceOrder">
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Billing Details -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 style="color:red;padding-left: 20px;">
                          Billing Details 
                        </h4>
                        <hr/>
                      </div>
                      <div class="">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Full Name*" name="name" value="{{$customer['name']}}">
                                <div id="name_error" class="field_error"></div> 
                              </div>
                                     
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" placeholder="Email Address*" name="email" value="{{$customer['email']}}">
                                <div id="email_error" class="field_error"></div> 
                              </div>                             
                            </div>
                          </div> 
 
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" placeholder="Mobile*" name="mobile" value="{{$customer['mobile']}}">
                                <div id="mobile_error" class="field_error"></div> 
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <select name="country">
                                  <option>Select Your Country</option>
                                  <option value="1">Australia</option>
                                  <option value="2">Afganistan</option>
                                  <option value="3">Bangladesh</option>
                                  <option value="4">Belgium</option>
                                  <option value="5">Brazil</option>
                                  <option value="6">Canada</option>
                                  <option value="7">China</option>
                                  <option value="8">Denmark</option>
                                  <option value="9">Egypt</option>
                                  <option value="10">India</option>
                                  <option value="11">Iran</option>
                                  <option value="12">Israel</option>
                                  <option value="13">Mexico</option>
                                  <option value="14">UAE</option>
                                  <option value="15">UK</option>
                                  <option value="16">USA</option>
                                </select>
                                <div id="country_error" class="field_error"></div> 
                              </div>                             
                            </div> 
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3" name="address" placeholder="Adress" value="">{{$customer['adress']}}</textarea>
                              </div>    
                              <div id="address_error" class="field_error"></div>                          
                            </div>                            
                          </div>   

                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Company(optional)" name="company">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="City / Town*" name="city" value="{{$customer['city']}}">
                              </div>
                              <div id="city_error" class="field_error"></div> 
                            </div>
                          </div>   
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="State*" name="state" value="{{$customer['state']}}">
                              </div>
                              <div id="state_error" class="field_error"></div>                              
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Postcode / ZIP*" name="zip" value="{{$customer['zip']}}">
                              </div>
                              <div id="zip_error" class="field_error"></div> 
                            </div>
                          </div>                                    
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $sum = 0;
                        @endphp
                        @foreach($data as $list)
                        <tr>
                          <td>
                            <b>{{$list->name}}</b> <strong> x  {{$list->qty}} </strong>
                            <br/>
                            <span class="text text-primary text-3">{{$list->color}}</span>
                          </td>
                          <td>{{$list->price * $list->qty}} Tk</td>
                         
                        </tr>
                        @php
                          $sub_toal = $list->price * $list->qty; 
                          $sum = $sum + $sub_toal
                        @endphp
                        @endforeach
                      </tbody>
                      <tfoot>

                         <tr class="hide cupon_code_box">
                          <th>Coupon Code <a href="javascript:void(0)" onclick="remove_cupon_code()"> <i class="fa fa-close"> </i></a></th>
                          <td id="cupon_code_value"></td>
                        </tr>
                        <tr>
                          <th>Total</th>
                          <td id="total_price">{{$sum}} Tk</td>
                        </tr>

                      </tfoot>
                    </table>
                  </div>
                  <!-- Coupon section -->
                  <h4>Have a Cupon</h4>
                    <div class="panel panel-default aa-checkout-coupon">
                      <div class="panel-body">
                          <input type="text" name="cupon_code" id="cupon_code" placeholder="Coupon Code" class="aa-coupon-code cupon_code_apply" value="{{$customer['coupon_code']}}">
                          <input type="button" value="Apply Coupon" class="aa-browse-btn cupon_code_apply" onclick="ApplyCoponCode()">
                        </div>
                        <div id="cupon_code_msg"></div>
                    </div>
                  <h4>Payment Method</h4>
                  <div class="aa-payment-method">                    
                    <label for="cod"><input type="radio" id="code" name="payment_type" checked value="COD"> Cash on Delivery </label>
                    <label for="instamojo"><input type="radio" id="instamojo" name="payment_type" value="Gateway"> Via Instamojo </label>  

                    <input type="submit" value="Place Order" class="aa-browse-btn" id="btnPlaceOrder">          
                  </div>
                  <div id="order_place_msg"></div>
                </div>
              </div>
            </div>
            @csrf
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
<style type="text/css">
.aa-coupon-code{
  border: 1px solid #ccc;
  height: 40px;
  padding: 10px;
  width: 100%;
  margin-bottom: 15px;
}
#cupon_code_msg {
  margin: 10px;
}
.fa.fa-close {
  color: red;
  margin-left: 10px;
  font-size: 15px;
}
</style>
@endsection
