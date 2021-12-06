@extends('Frontend/Includes/layout')
@section('page_title','Daily Shop | Registration')

<!-- / menu -->

@section('content')

 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-3">
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Change Password</h4>
                 <form action="" class="aa-login-form" id="frmChangePassword">
                    <label for="">Enter New Password<span>*</span></label>
                    <input type="password" placeholder="Create New Password" name="password" required>
                    <button type="submit" class="aa-browse-btn" id="btnChangePassword">Change</button>
                    @csrf
                  </form>
                </div>
                <div id="success_msg">

                </div>
              </div>
              <div class="col-md-3">
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <style type="text/css">
span.field_error {
    color: red;
    display: block;
    font-weight: bold;
    margin-top: -11px;
    margin-bottom: 9px;
}

div#success_msg {
    width: 100%;
    overflow: hidden;
    padding-top: 15px;
}
 </style>
 <!-- / Cart view section -->
@endsection
