@extends('Frontend/Includes/layout')
@section('page_title','Daily Shop | Cart')

<!-- / menu -->

@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{asset('Frontend/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Cart</li>
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
             	@if($list !== '')
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $sum = 0;
                      @endphp
                    	@foreach($list as $data)
                      <tr id="cart_box{{$data->attr_id}}">
                        <td><a class="remove" href="javascript:void(0)" onclick="delCartProduct('{{$data->pid}}','{{$data->size}}','{{$data->color}}','{{$data->attr_id}}')"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="{{asset('storage/media/'.$data->attr_image)}}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#">{{$data->name}}</a>
                        	@if($data->size != '')
                        		</br> Size : {{$data->size}}
                        	@endif
                        	@if($data->color != '')
                        		</br> Color : {{$data->color}}
                        	@endif
                        </td>
                        <td>${{$data->price}}</td>
                        <td><input class="aa-cart-quantity" id="qty{{$data->attr_id}}" onchange="updateQty('{{$data->pid}}','{{$data->size}}','{{$data->color}}','{{$data->attr_id}}','{{$data->price}}')" type="number" value="{{$data->qty}}"></td>
                        <!-- //total row price -->
                        @php
                        $row_total = $data->qty * $data->price;
                        $sum = $sum + $row_total
                        @endphp
                        <!-- //total row price -->
                        <td id="row_total_price{{$data->attr_id}}">${{$row_total}}</td>
                      </tr>
                      @endforeach
                       @php
                        

                        @endphp
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <h4 class="text-right"><b>Total : {{$sum}}</b></h4>
                        </td>
                      </tr>
                      </tbody>
                  </table>
                  <a href="{{url('/checkout')}}" class="aa-cart-view-btn">Checkout</a>
                </div>

               	@else

                	<h3>Cart is Empty !</h3>;

                @endif
                	
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
