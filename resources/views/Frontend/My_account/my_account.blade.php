@extends('Frontend/Includes/layout')
@section('page_title','Daily Shop | My-account')

<!-- / menu -->

@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{asset('Frontend/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Order Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Order</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
    <div id="add_to_card_msg" style="margin-top: 20px;"></div>
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">

               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>View</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                        <th>Total Price</th>
                        <th>Payment Type</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                     <!--  @php
                        $sum = 0;
                      @endphp -->

                        <!-- $row_total = $data->qty * $data->price;
                        $sum = $sum + $row_total -->
                    @foreach($orders as $list)
                      <tr>
                        <td><a href="{{url('order-detail')}}/{{$list->id}}" class="btn btn-info">View</a></td>
                        @if($list->order_status == 1)
                        <td>Placed</td>
                        @elseif($list->order_status == 2)
                        <td>Pendding</td>
                         @elseif($list->order_status == 3)
                         <td>Conform</td>
                        @endif
                        <td>{{$list->payment_status}}</td>
                        <td>{{$list->total_amount}}</td>
                        <td>{{$list->payment_type}}</td>
                      </tr>
                    @endforeach

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
<input type="hidden" id="qty" name="qty" value="1">

<form id="frmSAddToCart">
  <input type="hidden" id="size_id" name="size_id">
  <input type="hidden" id="color_id" name="color_id">
  <input type="hidden" id="pqty" name="pqty">

  <input type="hidden" id="product_id" name="product_id">
  @csrf
</form>
<style type="text/css">
.cart-total {
    float: right;
    width: 40%;
}
</style>
  

@endsection