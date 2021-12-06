<!-- layout page  -->
@extends('Admin/Includes/Layout')
<!-- page header title -->
@section('page_title','Product')

@php
    if($id>0){
        $required = '';
    }
    else{
       $required = 'required';
    }

@endphp
<!-- page header title -->
@section('page_header')

 <script src="{{ asset('Admin_assets/tinymce/jquery.tinymce.min.js')}}"></script>
    <script src="{{ asset('Admin_assets/tinymce/tinymce.min.js')}}">
       
    </script>
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
                                    <li class="list-inline-item">Add Product</li>
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
<div class="contetn-title">
    <h2 style="margin-left:50px;">Manage Product</h2>
</div>

<div class="back-btn" style="margin-top:30px;">
    <a href="{{route('product')}}">
    <button style="margin-left:50px;" type="button" class="btn btn-primary">Back</button>
    </a>
</div>
<div class="product_attr_delete_msg_show m-3">
    @if(session('message'))
    <div class="mt-3 alert alert-danger" role="alert">
    <h4>{{session('message')}}</h4>
    </div>
    @endif
</div>
<div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                 <form action="{{route('product.manage.process')}}" method="post" enctype="multipart/form-data">
                   @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white text-center">
                                @if($id)
                                    <strong>Edit Product</strong> 
                                @else
                                     <strong>Add New Product</strong> 
                                @endif
                            </div>
                            <div class="card-body card-block">
                               
                                <div class="has-success form-group col-sm-12">
                                    <label for="name" class=" form-control-label"> Name*</label>
                                    <input type="text" value="{{old('name')}}{{$name}}" id="name" name="name" class="form-control-success form-control">
                                    @error('name')
                                 <div class="mt-3 alert alert-danger" role="alert">
                                         {{$message}}
									</div>
                                    @enderror
                                </div>

                                <div class="has-success form-group col-sm-12">
                                    <label for="slug" class=" form-control-label">Slug*</label>
                                    <input type="text" value="{{$slug}}{{old('slug')}}" id="slug" name="slug" class="form-control-success form-control">
                                    @error('slug')
                                 <div class="mt-3 alert alert-danger" role="alert">
                                         {{$message}}
									</div>
                                    @enderror
                                </div>

                                <div class="has-success form-group col-sm-12">
                                    <label for="image" class=" form-control-label"> Image*</label>
                                    <input type="file" value="" id="image" name="image" class="form-control-success form-control" {{$required}}>
                                    @if($id)
                                        <img style="width:100px;height: 100px;" src="{{asset('storage/media/'.$image)}}">
                                    @endif
                                    @error('image')
                                 <div class="mt-3 alert alert-danger" role="alert">
                                         {{$message}}
									</div>
                                    @enderror
                                </div>

                                <div class="has-success form-group col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="category_id" class=" form-control-label">Category*</label>
                                            <select required name="category_id" class="form-control-success form-control" id="category_id">
                                                <option>Select Category</option>
                                                @foreach($categorys as $list)
                                                    @if($id)
                                                        @if($category_id == $list->id)
                                                         <option selected value="{{$list->id}}">
                                                        @else
                                                         <option value="{{$list->id}}{{old('id')}}">
                                                        @endif
                                                         {{$list->category_name}}
                                                        </option>
                                                    @else
                                                   <option value="{{$list->id}}"> {{$list->category_name}}
                                                    </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                             <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="brand" class=" form-control-label">Brand*</label>
                                            <select name="brand" class="form-control-success form-control" id="brand">
                                                <option >Select Brand</option>
                                            @foreach($brands as $list)
                                                <!-- if id has -->
                                                @if($id)
                                                    @if($brand == $list->id)
                                                     <option selected value="{{$list->id}}">
                                                    @else
                                                     <option value="{{$list->id}}">
                                                    @endif
                                                     {{$list->brand}}
                                                    </option>
                                                    @else
                                                <!-- if id has -->
                                                   <option value="{{$list->id}}"> {{$list->brand}}
                                                    </option>
                                                @endif
                                            @endforeach
                                            </select>
                                            @error('brand_id')
                                         <div class="mt-3 alert alert-danger" role="alert">
                                                 {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="model" class=" form-control-label">Model*</label>
                                            <input value="{{$model}}{{old('model')}}" name="model" class="form-control-success form-control" id="model">
                                            @error('model')
                                         <div class="mt-3 alert alert-danger" role="alert">
                                                 {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="has-success form-group col-sm-12">
                                    <label for="short_desc" class=" form-control-label">Short Description*</label>
                                    <textarea type="text" value="{{old('short_desc')}}" id="short_desc" name="short_desc" class="form-control-success form-control editor">{{$short_desc}}{{old('short_desc')}}</textarea>
                                    @error('short_desc')
                                 <div class="mt-3 alert alert-danger" role="alert">
                                         {{$message}}
									</div>
                                    @enderror
                                </div>

                                <div class="has-success form-group col-sm-12">
                                    <label for="desc" class=" form-control-label"> Description*</label>
                                    <textarea type="text" value="" id="desc" name="desc" class="form-control-success form-control editor">{{$desc}}{{old('desc')}}</textarea>
                                    @error('desc')
                                 <div class="mt-3 alert alert-danger" role="alert">
                                         {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="has-success form-group col-sm-12">
                                    <label for="technical_specification" class=" form-control-label">Technical Specification*</label>
                                    <input type="text" value="{{$technical_specification}}{{old('technical_specification')}}" id="technical_specification" name="technical_specification" class="form-control-success form-control editor">
                                    @error('technical_specification')
                                 <div class="mt-3 alert alert-danger" role="alert">
                                         {{$message}}
									</div>
                                    @enderror
                                </div>

                                <div class="has-success form-group col-sm-12">
                                    <label for="keyword" class=" form-control-label">Keyword*</label>
                                    <input type="text" value="{{$keyword}}{{old('keyword')}}" id="keyword" name="keyword" class="form-control-success form-control">
                                    @error('keyword')
                                 <div class="mt-3 alert alert-danger" role="alert">
                                         {{$message}}
									</div>
                                    @enderror
                                </div>

                                <div class="has-success form-group col-sm-12">
                                    <label for="uses" class=" form-control-label">Uses*</label>
                                    <input type="uses" value="{{$uses}}{{old('uses')}}" id="uses" name="uses" class="form-control-success form-control">
                                    @error('uses')
                                     <div class="mt-3 alert alert-danger" role="alert">
                                        {{$message}}
    								</div>
                                    @enderror
                                </div>

                                <div class="has-success form-group col-sm-12">
                                    <label for="warranty" class=" form-control-label">Warranty*</label>
                                    <input type="warranty" value="{{$warranty}}{{old('warranty')}}" id="warranty" name="warranty" class="form-control-success form-control">
                                    @error('warranty')
                                     <div class="mt-3 alert alert-danger" role="alert">
                                    {{$message}}
                                    </div>
                                    @enderror
                                    </div>

                                    <div class="row">
                                        <div class="has-success form-group col-sm-4">
                                            <label for="mrp" class=" form-control-label">Lead Time*</label>
                                           <input value="{{$lead_time}}" name="lead_time" class="form-control-success form-control" id="lead_time">

                                            @error('lead_time')
                                             <div class="mt-3 alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="mrp" class=" form-control-label">Tax*</label>
                                           <input value="{{$tax}}" name="tax" class="form-control-success form-control" id="tax">

                                            @error('tax')
                                             <div class="mt-3 alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="tax_id" class=" form-control-label">Tax Type*</label>
                                            <select required name="tax_id" class="form-control-success form-control" id="tax_id">
                                                <option >Select Tax Type</option>
                                                @foreach($taxs as $list)
                                                    @if($id)
                                                        @if($tax_id == $list->id)
                                                         <option selected value="{{$list->id}}">
                                                        @else
                                                         <option value="{{$list->id}}{{old('id')}}">
                                                        @endif
                                                         {{$list->tax_value}}
                                                        </option>
                                                        @else
                                                       <option value="{{$list->id}}"> {{$list->tax_value}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                             <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="is_promo" class=" form-control-label">Is Promo*</label>
                                            <select name="is_promo" class="form-control-success form-control" id="is_promo">
                                                @if($is_promo == '1')
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                                @else
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                                @endif
                                            </select>
                                            @error('is_promo')
                                         <div class="mt-3 alert alert-danger" role="alert">
                                                 {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="is_promo" class=" form-control-label">Is Featured*</label>
                                            <select name="is_featured" class="form-control-success form-control" id="is_featured">
                                                @if($is_featured == '1')
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                                @else
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                                @endif
                                            </select>
                                            @error('is_featured')
                                         <div class="mt-3 alert alert-danger" role="alert">
                                                 {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="is_discounted" class=" form-control-label">Is Discounted*</label>
                                            <select name="is_discounted" class="form-control-success form-control" id="is_discounted">
                                                @if($is_discounted == '1')
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                                @else
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                                @endif
                                            </select>
                                            @error('is_promo')
                                         <div class="mt-3 alert alert-danger" role="alert">
                                                 {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="is_tranding" class=" form-control-label">Is Tranding*</label>
                                            <select name="is_tranding" class="form-control-success form-control" id="is_tranding">
                                                @if($is_tranding == '1')
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                                @else
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                                @endif
                                            </select>
                                            @error('is_tranding')
                                         <div class="mt-3 alert alert-danger" role="alert">
                                                 {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- product multi image added section -->
                    <div class="row">
                        <div class="card card-header bg-primary col-sm-12">
                            <h2>Product Images</h2>
                        </div>
                        <!-- product attributes images message error show -->


                         @error('images.*')
                             <div class="mt-3 alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                        <!--end product attributes error message show -->

                        <div class="col-sm-12">
                            <div class="card card-body">
                                <div class="has-success form-group col-sm-12">
                                    <div class="row" id="product_images_box">
                                        @php
                                            $loop_count_num = 1;
                                        @endphp

                                        @foreach($product_images_arr as $key=>$val)

                                        @php
                                            $loop_count_prev = $loop_count_num;
                                            $pImgs = (array)$val;
                                        @endphp

                                         <input type="hidden" value="{{$pImgs['id']}}" name="pIid[]" class="form-control-success form-control" id="pIid">
                                        <div class="col-sm-4 product_images{{$loop_count_num++}}">
                                            <label for="images" class=" form-control-label">Attr Image*</label>
                                           <input type="file" name="images[]" class="form-control-success form-control" id="images">
                                        @if($id)
                                            @if($pImgs['images'] !='')
                                            <img style="width: 100px;height: 100px;" src="{{asset('storage/media/'.$pImgs['images'])}}">
                                           @endif
                                        @endif
       
                                        </div>    
                                        @endforeach
                                        <!-- remove and add button show -->
                                        @if($loop_count_num==2)
                                            <div class="col-sm-2">
                                            <label for="qty" class="form-control-label">&nbsp;&nbsp;&nbsp;</label>
                                            <button type="button" class="btn btn-success mt-4" style="margin-top: 10px;" onclick="add_image_more()"><i class="fa fa-plus">&nbsp; </i>Add
                                            </button>
                                        </div>
                                        @else
                                            <div class="col-sm-2">
                                            <label for="qty" class="form-control-label">&nbsp;&nbsp;&nbsp;</label>
                                            <a href="{{url('admin/product/product_images_delete')}}/{{$pImgs['id']}}/{{$id}}">
                                            <button type="button" class="btn btn-danger mt-4" style="margin-top: 10px;"><i class="fa fa-minus">&nbsp; </i>Remove
                                            </button>
                                            </a>
                                        </div>
                                        @endif
                                        <!-- remove and add button show end-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- product attributes section -->
                    <div class="row">
                        <div class="card card-header bg-primary col-sm-12">
                            <h2>Product Attributes</h2>
                        </div>
                        <!-- product attributes message error show -->

                        @if(session()->has('sku_error'))
                            <div class="alert alert-danger form-control" role="alert">
                                {{session('sku_error')}}
                            </div>
                        @endif

                         @error('attr_image.*')
                             <div class="mt-3 alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                        <!--end product attributes error message show -->

                        <div class="col-sm-12" id="product_attr_box">
                            @php
                                $loop_count_num = 1;
                            @endphp

                            @foreach($product_att_arr as $key=>$val)

                            @php
                                $loop_count_prev = $loop_count_num;
                                $pArt = (array)$val;
                            @endphp

                             <input type="hidden" value="{{$pArt['id']}}" name="paid[]" class="form-control-success form-control" id="paid">


                            <div class="card card-body" id="product_attr_{{$loop_count_num++}}">
                                <div class="has-success form-group col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label for="category_id" class=" form-control-label">SKU*</label>
                                            <input required value="{{$pArt['sku']}}" name="sku[]" class="form-control-success form-control" id="sku">
       
                                            @error('sku')
                                             <div class="mt-3 alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-2">
                                            <label for="mrp" class=" form-control-label">MRP*</label>
                                           <input required value="{{$pArt['mrp']}}" name="mrp[]" class="form-control-success form-control" id="mrp">
       
                                            @error('mrp')
                                             <div class="mt-3 alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-2">
                                            <label for="price" class=" form-control-label">Price*</label>
                                           <input required value="{{$pArt['mrp']}}" name="price[]" class="form-control-success form-control" id="mrp">
       
                                            @error('price')
                                             <div class="mt-3 alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="size" class=" form-control-label">Size*</label>
                                            <select name="size_id[]" class="form-control-success form-control" id="size_id">
                                                <option >Select</option>
                                            @foreach($sizes as $list)
                                                @if($pArt['size_id'] == $list->id)
                                                    <option selected value="{{$list->id}}"> {{$list->size}}
                                                    </option>
                                                @else
                                                    <option value="{{$list->id}}"> {{$list->size}}
                                                    </option>
                                                @endif
                                            @endforeach
                                            </select>
                                            @error('sizes')
                                         <div class="mt-3 alert alert-danger" role="alert">
                                                 {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="color_id" class=" form-control-label">Color*</label>
                                            <select name="color_id[]" class="form-control-success form-control" id="color_id">
                                                <option >Select</option>
                                            @foreach($colors as $list)
                                                 @if($pArt['color_id'] == $list->id)
                                                    <option selected value="{{$list->id}}"> {{$list->color}}
                                                    </option>
                                                @else
                                                    <option value="{{$list->id}}"> {{$list->color}}
                                                    </option>
                                                @endif
                                            @endforeach
                                            </select>
                                            @error('color')
                                         <div class="mt-3 alert alert-danger" role="alert">
                                                 {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-2">
                                            <label for="qty" class=" form-control-label">Qty*</label>
       
                                           <input required value="{{$pArt['qty']}}" name="qty[]" class="form-control-success form-control" id="qty">
                                            @error('qty')
                                             <div class="mt-3 alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="qty" class=" form-control-label">Attr Image*</label>
                                           <input type="file" name="attr_image[]" class="form-control-success form-control" id="attr_image">
                                           
                                           
       
                                        </div>
                                        @if($id)
                                            @if($pArt['attr_image'] !='')
                                            <div class="col-sm-3">
                                                <label for="qty" class=" form-control-label">Recent Image*</label>
                                               
                                                <div class="selected-img-show">
                                                   <img style="width: 100px;height: 100px;" src="{{asset('storage/media/'.$pArt['attr_image'])}}">
                                               </div>
                                              
           
                                            </div>
                                             @endif
                                        @endif

                                        <!-- remove and add button show -->
                                        @if($loop_count_num==2)
                                            <div class="col-sm-2">
                                            <label for="qty" class="form-control-label">&nbsp;&nbsp;&nbsp;</label>
                                            <button type="button" class="btn btn-success mt-4" style="margin-top: 10px;" onclick="add_more()"><i class="fa fa-plus">&nbsp; </i>Add
                                            </button>
                                        </div>
                                        @else
                                            <div class="col-sm-2">
                                            <label for="qty" class="form-control-label">&nbsp;&nbsp;&nbsp;</label>
                                            <a href="{{url('admin/product/product_attr_delete')}}/{{$pArt['id']}}/{{$id}}">
                                            <button type="button" class="btn btn-danger mt-4" style="margin-top: 10px;"><i class="fa fa-minus">&nbsp; </i>Remove
                                            </button>
                                            </a>
                                        </div>
                                        @endif
                                        <!-- remove and add button show end-->

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    @if($id)
                     <input type="submit" id="inputError2i" class="btn btn-md btn-primary mb-4 ml-4" value="Product Edit" >
                    @else
                     <input type="submit" id="inputError2i" class="btn btn-md btn-primary mb-4 ml-4" value="Product Add" >
                    @endif
                    <input type="hidden" name="id" value="{{$id}}">
                </form>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
     tinymce.init({
        selector: '.editor',
        
      });
    var loop_count = 1;
    function add_more()
    {
        loop_count++;
       var html = '  <input type="hidden" value="" name="paid[]" class="form-control-success form-control" id="paid"><div id="product_attr_remove'+loop_count+'" class="card card-body"><div class="has-success form-group col-sm-12"><div class="row">';

       html+='<div class="col-sm-2"><label for="sku" class=" form-control-label">SKU*</label><input required name="sku[]" class="form-control-success form-control" id="sku"> </div>';

        html+='<div class="col-sm-2"><label for="mrp" class=" form-control-label">MRP*</label><input required name="mrp[]" class="form-control-success form-control" id="mrp"> </div>';

         html+='<div class="col-sm-2"><label for="price" class=" form-control-label">Price*</label><input required name="price[]" class="form-control-success form-control" id="price"> </div>';

           var size_id_html = jQuery('#size_id').html();
           size_id_html = size_id_html.replace("selected","");
           html+='<div class="col-sm-3"><label for="size" class=" form-control-label">Size*</label><select required name="size_id[]" class="form-control-success form-control" id="size_id">'+size_id_html+'   </select></div> ';

            var color_id_html = jQuery('#color_id').html();
            color_id_html = color_id_html.replace("selected","");
           html+='<div class="col-sm-3"><label for="color_id" class=" form-control-label">Color*</label><select required name="color_id[]" class="form-control-success form-control" id="color_id">'+color_id_html+'   </select></div> ';

           html+='<div class="col-sm-2"><label for="qty" class=" form-control-label">Qty*</label><input required name="qty[]" class="form-control-success form-control" id="qty"> </div>';

             html+='<div class="col-sm-4"><label for="image" class=" form-control-label">Image*</label><input type="file" name="attr_image[]" class="form-control-success form-control" id="image"> </div>';

             html+='<div class="col-sm-2"><label for="qty" class="form-control-label">&nbsp;&nbsp;&nbsp;</label> <button type="button" class="btn btn-danger" onclick=remove_more("'+loop_count+'")><i class="fa fa-minus"></i> &nbsp; Remove </button></div>'

          html+='</div></div></div>';

         jQuery('#product_attr_box').append(html);

    }


 //remove attributes function
    function remove_more(loop_count)
        {
            jQuery('#product_attr_remove'+loop_count).remove();
        }

//add muliple images
    var loop_image_count = 1;
    function add_image_more()
        {
            loop_image_count++;
            var html='<input type="hidden" name="pIid[]" class="form-control-success form-control" id="pIid"><div class="col-sm-4 product_images'+loop_image_count+'"><label for="images" class=" form-control-label">Add Image*</label><input type="file" name="images[]" class="form-control-success form-control" id="images"> </div>';

             html+='<div class="col-sm-2 product_images'+loop_image_count+'"><label for="qty" class="form-control-label">&nbsp;&nbsp;&nbsp;</label> <button type="button" class="btn btn-danger" onclick=remove_images_more("'+loop_image_count+'")><i class="fa fa-minus"></i> &nbsp; Remove </button></div>'

             jQuery('#product_images_box').append(html);
        }

 //remove attributes images
    function remove_images_more(loop_image_count)
        {
            jQuery('.product_images'+loop_image_count).remove();
        }





</script>
@endsection
