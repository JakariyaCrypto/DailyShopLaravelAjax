@extends('Admin/Includes/Layout')
<!-- active menu -->
@section('order_select','active')
<!-- page header title -->
@section('page_title','Order-details')
<!-- page header down title -->
@section('page_header')
    <section class="au-breadcrumb">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="au-breadcrumb-content">
                            <div class="au-breadcrumb-left">
                                <span class="au-breadcrumb-span">You are here:</span>
                                <ul class="list-unstyled list-inline au-breadcrumb__list">
                                    <li class="list-inline-item active">
                                        <a href="{{route('admin.dashboard')}}">Home</a>
                                    </li>
                                    <li class="list-inline-item seprate">
                                        <span>/</span>
                                    </li>
                                    <li class="list-inline-item">Manage Order</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 @endsection

<!-- add category content -->
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">             
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
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
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
         <div class="cart-view-area" style="background: white">
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
                          <td>{{$list->price}} Tk</td>
                          <td>{{$list->qty}}</td>
                          <td>{{$row_total}}</td>
                        </tr>
                        @endforeach
                        <tr>
                          <td colspan="5">&nbsp;</td>
                          <td><b>Sub Total : </b></td>
                          <td colspan="6">{{$sum}} Tk</td>
                        </tr>

                        <?php
                          // prx($order_detail);
                          $finalTotal = $sum - $order_detail[0]->coupon_value;
                          if ($order_detail[0]->coupon_value>0) {
                            echo '
                              <tr style="border:none;">
                                <td colspan="5">&nbsp;</td>
                                <td><b>Coupon (<span class="text text-danger">'.$order_detail[0]->coupon_code.'</span>): </b></td>
                                <td colspan="6">'.$order_detail[0]->coupon_value.' Tk</td>
                              </tr>
                              <tr>
                                <td colspan="5">&nbsp;</td>
                                <td><b>Total : </b></td>
                                <td colspan="6">'.$finalTotal.' Tk</td>
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
        </div>
    </div>
</div>
@endsection



