@extends('Frontend/Includes/layout')
@section('page_title','Daily Shop | Single | Product')
@section('content')
	
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{asset('Frontend/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2 style="font-size: 20px">{{$products[0]->name}}</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li><a href="#">Product</a></li>
          <li class="active">{{$products[0]->name}}</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="{{asset('storage/media/'.$products[0]->image)}}" class="simpleLens-lens-image"><img src="{{asset('storage/media/'.$products[0]->image)}}" class="simpleLens-big-image"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                                                            
                          @if(isset($product_images[$products[0]->id][0]))
                            @foreach($product_images[$products[0]->id] as $list)
                              <a data-big-image="{{asset('storage/media/'.$list->images)}}" data-lens-image="{{asset('storage/media/'.$list->images)}}" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="{{asset('storage/media/'.$list->images)}}" style="width: 70px; height: 80px;">
                          </a>  
                            @endforeach
                          @endif
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>{!!$products[0]->name!!}</h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price"><del class=" text-danger">Tk {!!$products_attr[$products[0]->id][0]->price!!}</del></span>
                      	 <span class="aa-product-view-price">Tk {!!$products_attr[$products[0]->id][0]->mrp!!}</span>
                      <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                      @if($products[0]->lead_time !=='')
                      <p class="aa-product-avilability">Lead Time: <span>{{$products[0]->lead_time }}</span></p>
                      @endif
                      @if($products[0]->warranty !=='')
                      <p class="aa-product-avilability">Warranty: <span>{{$products[0]->warranty }}</span></p>
                      @endif
                    </div>
                    <!-- size content start -->
                    @if($products_attr[$products[0]->id][0]->size_id > 0)
                    <h4>Size:</h4>
                    <div class="aa-prod-view-size">
                      <!-- //unique size  -->
                      @php
                        $arr_size=[];
                        foreach($products_attr[$products[0]->id] as $attr)
                          {
                            $arr_size[] = $attr->size;
                          }

                          $arr_size = array_unique($arr_size);

                      @endphp
                      

                    	@foreach($arr_size as $attr)
	                      @if($attr !='')
	                      <a href="javascript:void(0)" onclick="showColor('{{$attr}}')" id="size_{{$attr}}" class="size_border_hide">{{$attr}}</a>
	                      @endif
	                    @endforeach
                      
                    </div>
                    @endif
                    <!-- size content end -->

                    <!-- color content start -->
                    @if($products_attr[$products[0]->id][0]->color_id > 0)
                    <h4>Color:</h4>
                    <div class="aa-color-tag">
	                    @foreach($products_attr[$products[0]->id] as $attr)
	                    
	                      @if($attr->color !='')
	                      <a href="javascript:void(0)" class="aa-color-{{strtolower($attr->color)}} product_color size_{{$attr->size}} color_border_hide" onclick=chage_product_color_image("{{asset('storage/media/'.$attr->attr_image)}}","{{$attr->color}}")></a>
	                      @endif
	                    @endforeach
                    </div>
                    @endif
                    <!-- color content end -->

                    <div class="aa-prod-quantity">
                      <form action="">
                        <select id="qty" name="qty">
                          @for($i=1;$i<11;$i++)
                            <option value="{{$i}}">{{$i}}</option>
                          @endfor
                          
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Model: <a href="#">{!!$products[0]->model!!}</a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="javascript:void(0)" onclick="add_to_cart('{{$products[0]->id}}','{{$products_attr[$products[0]->id][0]->size_id}}','{{$products_attr[$products[0]->id][0]->color_id}}')">Add To Cart</a>
                      <!-- pass color and size id -->
                      <form method="post" id="frmSAddToCart">
                        <input type="hidden" id="size_id" name="size_id">
                        <input type="hidden" id="color_id" name="color_id">
                        <input type="hidden" id="pqty" name="pqty">
                        <input type="hidden" id="product_id" name="product_id">
                        @csrf
                      </form>
                      <!-- pass color and size id -->
                      <!-- <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                      <a class="aa-add-to-cart-btn" href="#">Compare</a> -->
                    </div>
                    <div id="add_to_card_msg" style="margin-top: 20px;"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#review" data-toggle="tab">Reviews</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p>{!!$products[0]->desc!!}</p>
                </div>
                <div class="tab-pane fade mt-3" id="review">
                  <!-- review button -->
                  

                  @if(session()->has('FRONT_USER_LOGIN') != null)
                   <div class="review-button">
                     <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">Add Review</button>
                  </div>
                  @else
                  <div class="review-button">
                    <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                    OR
                    <li> <a href="{{url('registration')}}">Registration</a></li>
                  </div>
                  @endif
                  
                  <!-- review button -->
                 <div class="aa-product-review-area" id="show_review">

                   <!-- <h4>2 Reviews for T-Shirt</h4> --> 
                   <!-- <ul class="aa-review-nav"> -->
                     <!-- <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="{{asset('Frontend/img/testimonial-img-3.jpg')}}" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li> -->

                   <!-- </ul> -->
                 </div>
                </div>            
              </div>
            </div>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">

                <!-- start single product item -->
                        @if(isset($related_products[0]))
                         @foreach($related_products as $productAttr)
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{url('product/'.$productAttr->slug)}}"><img src="{{asset('storage/media/'.$productAttr->image)}}" alt="polo shirt img"></a>
                           <a class="aa-add-card-btn" href="javascript:void(0)" onclick="home_add_to_cart('{{$productAttr->id}}','{{$related_products_attr[$productAttr->id][0]->size}}','{{$related_products_attr[$productAttr->id][0]->color}}')"><span class="fa fa-shopping-basket"></span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="{{url('product/'.$productAttr->slug)}}">{{$productAttr->name}}</a></h4>
                              <span class="aa-product-price">Tk{{$related_products_attr[$productAttr->id][0]->price}}</span>
                                <span class="aa-product-price"><del>Tk{{$related_products_attr[$productAttr->id][0]->mrp}}</del></span>
                            </figcaption>
                          </figure>                         

                          <!-- product badge -->
                           <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                        </li>   
                        @endforeach  
                        @else

                            <h4 class="text bg-danger">Related Product Not Found !</h4>

                        @endif                                                                                   
              </ul>
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="{{asset('Frontend/img/view-slider/large/polo-shirt-1.png')}}">
                                          <img src="{{asset('Frontend/img/view-slider/medium/polo-shirt-1.png')}}" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="{{asset('Frontend/img/view-slider/large/polo-shirt-1.png')}}"
                                     data-big-image="Avilabilityimg/view-slider/medium/polo-shirt-1.png')}}">
                                      <img src="{{asset('Frontend/img/view-slider/thumbnail/polo-shirt-1.png')}}">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="{{asset('Frontend/img/view-slider/large/polo-shirt-3.png')}}"
                                     data-big-image="{{asset('Frontend/img/view-slider/medium/polo-shirt-3.png')}}">
                                      <img src="{{asset('Frontend/img/view-slider/thumbnail/polo-shirt-3.png')}}">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="Avilabilityimg/view-slider/large/polo-shirt-4.png')}}"
                                     data-big-image="Avilabilityimg/view-slider/medium/polo-shirt-4.png')}}">
                                      <img src="{{asset('Frontend/img/view-slider/thumbnail/polo-shirt-4.png')}}">
                                  </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->   
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- review modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
     <form  id="addReview">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-info" id="exampleModalLabel">Add Your Review</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <span id="error_msg"></span>
          <div class="form-group mt-3">
            <img class="blank_star" src="{{asset('Frontend/img/blank_star.png')}}" id="1_star">
            <img class="blank_star" src="{{asset('Frontend/img/blank_star.png')}}" id="2_star">
            <img class="blank_star" src="{{asset('Frontend/img/blank_star.png')}}" id="3_star">
            <img class="blank_star" src="{{asset('Frontend/img/blank_star.png')}}" id="4_star">
            <img class="blank_star" src="{{asset('Frontend/img/blank_star.png')}}" id="5_star">
          </div>
          <h5>E-mail <span class="text text-info">*</span></h5>
          <div class="form-group">
            <input type="E-mail" class="form-control" name="email" id="email">
            <input type="hidden" class="form-control" name="product_id" value="{{$products[0]->id}}" id="rating_pro_id">
            <span id="email_error"></span>
          </div>
          <h5>Comment <span class="text text-info">*</span></h5>
          <div class="form-group">
            <textarea type="text" class="form-control" name="comment"></textarea>
            <span id="comment_error"></span>
          </div>
          @csrf
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Review</button>
        </div>
      </div>
    </form>
  </div>
</div>

<style type="text/css">
.lead_time {
	margin-top: -11px;
	color: red;
	font-size: 17px;
	font-weight: bold;
	margin-bottom: 0;
	padding: 0;
}
#aa-product-details .aa-product-details-area .aa-product-details-content .aa-product-view-content .aa-color-tag .aa-color-yellow{
	background: yellow;
}

img.blank_star {
    width: 33px;
    margin-top: 15px;
}

.review-button{
  margin-top: 15px;
}
div#review li {
    display: inline;
    padding-left: 10px;
}
</style>
@endsection