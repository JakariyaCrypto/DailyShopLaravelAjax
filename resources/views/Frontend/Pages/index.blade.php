@extends('Frontend/Includes/layout')
@section('page_title','Daily Shop | Home')

<!-- / menu -->

@section('content')


  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->        
            @foreach($home_banners as $list)
            <li>
              <div class="seq-model">
                <img data-seq src="{{asset('storage/media/'.$list->image)}}" alt="{{$list->title}}" />
              </div>
              <div class="seq-title">
                <span data-seq>{{$list->save_up}}</span>                
                <h2 data-seq>{{$list->title}}</h2>                
                <p data-seq>{{$list->short_desc}}</p>
                <a data-seq href="{{$list->link}}" target="_blank" class="aa-shop-now-btn aa-secondary-btn">{{$list->button}}</a>
              </div>
            </li>
            @endforeach
            <!-- single slide item -->                     
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>


<!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              <!-- promo right -->
              <div class="col-md-12 no-padding">
                <div class="aa-promo-right">
                   @foreach($home_categories as $list)
                  <div class="aa-single-promo-right">
                   
                    <div class="aa-promo-banner">                      
                      <img src="{{asset('storage/media/'.$list->category_image)}}" alt="img">                      
                      <div class="aa-prom-content">
                        <span>Exclusive Item</span>
                        <h4><a href="{{url('category')}}/{{$list->category_slug}}">{{$list->category_name}}</a></h4>                        
                      </div>
                    </div>

                  </div>
                   @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="add_to_card_msg" style="margin-top: 20px;"></div>
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                   @foreach($home_categories as $list)

                    <li class=""><a href="#cat{{$list->id}}" data-toggle="tab">{{$list->category_name}}</a></li>

                    @endforeach
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    @php
                    @$loop_count = 1;
                    @endphp
                     @foreach($home_categories as $list)
                    @php
                      $cat_class = "";
                      if($loop_count == 1){
                         $cat_class = "active in";
                         $loop_count++;
                      }
                    @endphp
                   
                    <!-- Start men product category -->
                    <div class="tab-pane fade {{$cat_class}}" id="cat{{$list->id}}">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                        @if(isset($home_categorie_products[$list->id][0]))
                         @foreach($home_categorie_products[$list->id] as $productAttr)
                        <!-- start single product item -->

                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{url('product/'.$productAttr->slug)}}"><img src="{{asset('storage/media/'.$productAttr->image)}}" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn" href="javascript:void(0)" onclick="home_add_to_cart('{{$productAttr->id}}','{{$home_products_attr[$productAttr->id][0]->size}}','{{$home_products_attr[$productAttr->id][0]->color}}')"><span class="fa fa-shopping-basket"></span>Add To Cart</a>
                            <figcaption>
                              <h5 class="aa-product-title"><a href="{{url('product/'.$productAttr->slug)}}">{{$productAttr->name}}</a></h5>
                              <span class="aa-product-price">Tk{{$home_products_attr[$productAttr->id][0]->price}}</span>
                                <span class="aa-product-price"><del>Tk{{$home_products_attr[$productAttr->id][0]->mrp}}</del></span>
                            </figcaption>
                            
                            <!-- rating section -->
                            <!-- <span>

                            </span> -->
                            <!-- rating section -->

                          </figure>                         

                          <!-- product badge -->
                           <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>

                        </li>   

                        @endforeach  
                        @else
                        <li>
                          <figure>
                            <h4 class="text bg-danger">Data Nothing Found !</h4>
                          <li>
                        <figure>
                        @endif                   
                      </ul>


                    </div>
                    @endforeach
                    <!-- / men product category -->
                   
                  </div>
                  <!-- quick view modal -->     

                  <!-- / quick view modal -->              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="{{asset('Frontend/img/fashion-banner.jpg')}}" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#featured" data-toggle="tab">Featured</a></li>
                <li><a href="#discounted" data-toggle="tab">Discounted</a></li>
                <li><a href="#tranding" data-toggle="tab">Tranding</a></li>                    
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">

                <!-- Start men featured category -->
                <div class="tab-pane fade in active" id="featured">
                  <ul class="aa-product-catg aa-featured-slider">
                   
                    <!-- start single product item -->
                    @if(isset($home_featured_products[$list->id][0]))
                         @foreach($home_featured_products[$list->id] as $productAttr)
                        <!-- start single product item -->
                      
                        <li class="offer-product">
                          <figure>
                            <a class="aa-product-img" href="{{url('product/'.$productAttr->slug)}}"><img src="{{asset('storage/media/'.$productAttr->image)}}" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="javascript:void(0)" onclick="home_add_to_cart('{{$productAttr->id}}','{{$home_featured_products_attr[$productAttr->id][0]->size}}','{{$home_featured_products_attr[$productAttr->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                              <h5 class="aa-product-title"><a href="{{url('product/'.$productAttr->slug)}}">{{$productAttr->name}}</a></h5>
                              <span class="aa-product-price">${{$home_featured_products_attr[$productAttr->id][0]->price}}</span>
                                <span class="aa-product-price"><del>${{$home_featured_products_attr[$productAttr->id][0]->mrp}}</del></span>
                            </figcaption>
                          </figure>                         

                          <!-- product badge -->
                           <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                        </li>   
                        @endforeach  
                        @else
                        <li>
                          <figure>
                            <h4 class="text bg-danger">Data Nothing Found !</h4>
                          <li>
                        <figure>
                        @endif                   
                      </ul>                                                                                   
                  </ul>
                </div>
                <!-- / popular product category -->
                
                <!-- start discounted product category -->
                <div class="tab-pane fade" id="discounted">
                 <ul class="aa-product-catg aa-featured-slider">
                    
                    <!-- start single product item -->
                    @if(isset($home_discounted_products[$list->id][0]))
                         @foreach($home_discounted_products[$list->id] as $productAttr)
                        <!-- start single product item -->
                        <li class="offer-product">
                          <figure>
                            <a class="aa-product-img" href="{{url('product/'.$productAttr->slug)}}"><img src="{{asset('storage/media/'.$productAttr->image)}}" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="{{url('product/'.$productAttr->slug)}}">{{$productAttr->name}}</a></h4>
                              <span class="aa-product-price">${{$home_discounted_products_attr[$productAttr->id][0]->price}}</span>
                                <span class="aa-product-price"><del>${{$home_discounted_products_attr[$productAttr->id][0]->mrp}}</del></span>
                            </figcaption>
                          </figure>                         

                          <!-- product badge -->
                           <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                        </li>   
                        @endforeach  
                        @else
                        <li>
                          <figure>
                            <h4 class="text bg-danger">Data Nothing Found !</h4>
                          <li>
                        <figure>
                        @endif                                                                                   
                  </ul>
                </div>
                <!-- / featured product category -->

                <!-- start tranding product category -->
                <div class="tab-pane fade" id="tranding">
                  <ul class="aa-product-catg aa-featured-slider">
                   
                    <!-- start single product item -->
                    @if(isset($home_tranding_products[$list->id][0]))
                         @foreach($home_tranding_products[$list->id] as $productAttr)
                        <!-- start single product item -->
                        <li class="offer-product">
                          <figure>
                            <a class="aa-product-img" href="{{url('product/'.$productAttr->slug)}}"><img src="{{asset('storage/media/'.$productAttr->image)}}" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="{{url('product/'.$productAttr->slug)}}">{{$productAttr->name}}</a></h4>
                              <span class="aa-product-price">${{$home_tranding_products_attr[$productAttr->id][0]->price}}</span>
                                <span class="aa-product-price"><del>${{$home_tranding_products_attr[$productAttr->id][0]->mrp}}</del></span>
                            </figcaption>
                          </figure>                         

                          <!-- product badge -->
                           <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                        </li>   
                        @endforeach  
                        @else
                        <li>
                          <figure>
                            <h4 class="text bg-danger">Data Nothing Found !</h4>
                          <li>
                        <figure>
                        @endif                                                                                   
                  </ul>
                </div>
                <!-- / tranding product category -->              
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->


  <!-- Latest Blog -->
 

  <!-- / Latest Blog -->

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              @foreach($home_brands as $list)
              <li><a href="#"><img src="{{asset('storage/media/'.$list->image)}}" alt=""></a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->

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
  <!-- / Subscribe section -->
<!-- pass color and size id -->
    <input type="hidden" id="qty" name="qty" value="1">
    <form method="post" id="frmSAddToCart">
      <input type="hidden" id="size_id" name="size_id">
      <input type="hidden" id="color_id" name="color_id">
      <input type="hidden" id="pqty" name="pqty">
      <input type="hidden" id="product_id" name="product_id">
      @csrf
    </form>
<!-- pass color and size id -->
<style type="text/css">
.aa-product-img img {
  width: 100%;
  height: 185px;
}


</style>
@endsection
