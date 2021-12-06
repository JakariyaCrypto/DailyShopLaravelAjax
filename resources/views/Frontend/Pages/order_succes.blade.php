@extends('Frontend/Includes/layout')
@section('page_title','Daily Shop | Order Success')

<!-- / menu -->

@section('content')

 <!-- Cart view section -->
<div class="container">
     <div class="row">
      <div class="col-md-3">
        
      </div>
       <div class="col-md-6 col-sm-12">
         <div class="card">
             <div class="card-body">
               <h3 class="text-center text-success">Your Order has been placed successfull !
                <h4 class="text-center text-info">Order ID: {{session()->get('ORDER_ID')}}</h4>
               </h3>
             
             </div>
         </div>
       </div>
        <div class="col-md-3">
        
      </div>
     </div>
   </div>
<style type="text/css">
.card {
  padding: 20px;
  margin: 16px;
}
</style>
@endsection
