@extends('Frontend/Includes/layout')
@section('page_title','Daily Shop | Category')

<!-- / menu -->

@section('content')
    <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="" onchange="sort_by()" id="sort_by_product">
                    <option value="default" selected>{{$sort_txt}}</option>
                    <option value="name" selected>Name</option>
                    <option value="price_asc">Price Asc</option>
                    <option value="price_desc">Price Desc</option>
                    <option value="date">Date</option>
                  </select>

                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
                
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <div id="add_to_card_msg" style="margin-top: 20px;"></div>
              <ul class="aa-product-catg">

                <!-- start single product item -->
               @if(isset($products[0]))
                  @foreach($products as $productAttr)
                  <!-- start single product item -->
                  <li>
                    <figure>
                      <a class="aa-product-img" href="{{url('product/'.$productAttr->slug)}}"><img src="{{asset('storage/media/'.$productAttr->image)}}" alt="polo shirt img"></a>
                      <a class="aa-add-card-btn"href="javascript:void(0)" onclick="home_add_to_cart('{{$productAttr->id}}','{{$products_attr[$productAttr->id][0]->size}}','{{$products_attr[$productAttr->id][0]->color}}')"><span class="fa fa-shopping-basket"></span>Add To Cart</a>
                     
                      <figcaption>
                        <h5 class="aa-product-title"><a href="{{url('product/'.$productAttr->slug)}}">{{$productAttr->name}}</a></h5>
                        <span class="aa-product-price">Tk {{$products_attr[$productAttr->id][0]->price}}</span>
                          <span class="aa-product-price"><del>Tk {{$products_attr[$productAttr->id][0]->mrp}}</del></span>
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
                <!-- start single product item -->

                                                        
              </ul> 
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                @foreach($left_categories as $list)
                <li><a href="{{url('/category/'.$list->category_slug)}}">{{$list->category_name}}</a></li>
                @endforeach
              </ul>
            </div>

            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                 <span id="skip-value-upper" class="example-val">100.00</span>
                 <button class="aa-filter-btn" type="button" onclick="price_filter()">Filter</button>
               </form>
              </div>              

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                @foreach($colors as $color)
                  @if(in_array($color->id,$colorFilterArr))
                   <a class="aa-color-{{strtolower($color->color)}} filter_color_active" href="javascript:void(0)" onclick="setColor('{{$color->id}}','1')"></a>
                  @else
                    <a class="aa-color-{{strtolower($color->color)}}" href="javascript:void(0)" onclick="setColor('{{$color->id}}','0')"></a>
                  @endif
                @endforeach
              </div>                            
            </div>
          </aside>
        </div>
       
      </div>
    </div>
 <!-- pass color and size id -->
  <input type="hidden" id="qty" name="qty" value="1">
  <form id="frmSAddToCart">
  <input type="hidden" id="size_id" name="size_id">
  <input type="hidden" id="color_id" name="color_id">
  <input type="hidden" id="pqty" name="pqty">
  <input type="hidden" id="product_id" name="product_id">
  @csrf
  </form>
<!-- pass color and size id -->

 <!-- sort by filter url hidden -->

  <form id="categoryFilter">
  <input type="hidden" id="sort" name="sort" value="{{$sort_txt}}">
  <input type="hidden" id="min_filter_price" name="min_filter_price" value="{{$min_filter_price}}">
  <input type="hidden" id="max_filter_price" name="max_filter_price" value="{{$max_filter_price}}">
  <input type="hidden" id="color_filter" name="color_filter" value="{{$color_filter}}">
  </form>
 <!-- sort by filter url hidden -->

<style type="text/css">
  a.aa-product-img img {
      height: 250px;
  }
</style>
@endsection
