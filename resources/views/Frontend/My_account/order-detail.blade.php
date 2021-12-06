@extends('Frontend/Includes/layout')
@section('page_title','Daily Shop | My-account')

<!-- / menu -->

@section('content')

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
    <div id="add_to_card_msg" style="margin-top: 20px;"></div>
     <div class="row">
      <div class="col-sm-6">
        <div class="address">
            <h4>Details Address</h4>
            Name : {{$order_detail[0]->name}}<br/>
            E-mail : {{$order_detail[0]->email}}<br/>
            Mobile : {{$order_detail[0]->mobile}}<br/>
            city : {{$order_detail[0]->city}}<br/>
            zip : {{$order_detail[0]->zip}}<br/>
            Address : {{$order_detail[0]->address}}<br/>

        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card card-body">
            <div class="order_detail">
              <h4>Order Details</h4>
              Order Status :
               @if($order_detail[0]->order_status == 1) <span>Placed</span>
               @elseif($order_detail[0]->order_status == 2) <span>Pending</span>
               @elseif($order_detail[0]->order_status == 3) <span>Conform</span>
              @endif <br/>
              Payment Type : {{$order_detail[0]->payment_status}}<br/>
              Payment Status: {{$order_detail[0]->payment_type}}<br/>
              Order Id: {{$order_detail[0]->id}}<br/>

            </div>
          </div>
        </div>
      </div>
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">

               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Product</th>
                        <th>Coupon Code</th>
                        <th>Coupon value</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>qty</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      @php
                        $sum = 0;
                      @endphp

                        
                        @foreach($order_detail as $list)
                        @php 
                          $row_total = $list->qty * $list->price;
                          $sum = $sum + $row_total
                        @endphp
                        <tr>
                          <td>{{$list->pname}}</td>
                          <td>{{$list->coupon_code}}</td>
                          <td>{{$list->coupon_value}}</td>
                          <td>{{$list->color}}</td>
                          <td>{{$list->size}}</td>
                          <td><img src="{{asset('storage/media/'.$list->attr_image)}}"></td>
                          <td>{{$list->price}}</td>
                          <td>{{$list->qty}}</td>
                          <td>{{$row_total}}</td>
                        </tr>
                        @endforeach
                        <tr>
                          <td colspan="5">&nbsp;</td>
                          <td><b>Sub Total : </b></td>
                          <td colspan="6">{{$sum}}</td>
                        </tr>

                        <?php
                          // prx($order_detail);
                          $finalTotal = $sum - $order_detail[0]->coupon_value;
                          if ($order_detail[0]->coupon_value>0) {
                            echo '
                              <tr style="border:none;">
                                <td colspan="5">&nbsp;</td>
                                <td><b>Coupon (<span class="text text-danger">'.$order_detail[0]->coupon_code.'</span>): </b></td>
                                <td colspan="6">'.$order_detail[0]->coupon_value.'</td>
                              </tr>
                              <tr>
                                <td colspan="5">&nbsp;</td>
                                <td><b>Total : </b></td>
                                <td colspan="6">'.$finalTotal.'</td>
                              </tr>
                            ';
                          }
                        ?>
                  </table>
                </div>       
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
<!-- pass color and size id -->

<style type="text/css">
.cart-total {
    float: right;
    width: 40%;
}

.address {
  text-align: justify;
  margin-bottom: 30px;
  font-weight: bold;
}
.order_detail{
  text-align: justify;
  margin-bottom: 30px;
  font-weight: bold;
}
</style>
  

@endsection