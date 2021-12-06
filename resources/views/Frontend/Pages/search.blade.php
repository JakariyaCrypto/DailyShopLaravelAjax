@extends('Frontend/Includes/layout')
@section('page_title','Daily Shop | Search')

<!-- / menu -->

@section('content')
    <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-8">
          <div class="aa-product-catg-content">
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
                        <h4 class="aa-product-title"><a href="{{url('product/'.$productAttr->slug)}}">{{$productAttr->name}}</a></h4>
                        <span class="aa-product-price">${{$products_attr[$productAttr->id][0]->price}}</span>
                          <span class="aa-product-price"><del>${{$products_attr[$productAttr->id][0]->mrp}}</del></span>
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

<style type="text/css">
  a.aa-product-img img {
      height: 250px;
  }
</style>
@endsection
