<!-- layout page  -->
@extends('Admin/Includes/Layout')
<!-- page header title -->
@section('page_title','Category')
<!-- page header title -->
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
                                    <li class="list-inline-item">Add @yield('page_title')</li>
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
    <h2 style="margin-left:50px;">Manage Category</h2>
</div>

<div class="back-btn" style="margin-top:30px;">
    <a href="{{route('category')}}">
    <button style="margin-left:50px;" type="button" class="btn btn-primary">Back</button>
    </a>
</div>

<div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white text-center">
                                @if($id)
                                <strong>Edit Category</strong> 
                                @else
                                <strong>Add New Category</strong> 
                                @endif
                            </div>
                            <div class="card-body card-block">
                                <form action="{{route('category.manage.process')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="has-success form-group">
                                                <label for="category_name" class=" form-control-label">Category name*</label>
                                                <input type="text" value="{{$category_name}}" id="category_name" name="category_name" class="form-control-success form-control">
                                                @error('category_name')
                                                <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="has-warning form-group">
                                                <label for="category_slug" class="form-control-label">Category slug*</label>
                                                <input type="text" value="{{$category_slug}}" id="category_slug" name="category_slug" class="form-control-warning form-control">
                                                @error('category_slug')
                                                <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                       @if(!$categorys)
                                        
                                        @else
                                        <div class="col-sm-6">
                                            <div class="has-warning form-group">
                                                <label for="category_slug" class="form-control-label">Parent Category*</label>
                                                <select value="{{$parent_category_id}}" id="parent_category_id" name="parent_category_id" class="form-control-warning form-control">
                                                <option value>Select Category</option>
                                                    @foreach($categorys as $list)
                                                        @if($id)
                                                            @if($parent_category_id == $list->id)
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
                                            </div>
                                        </div>
                                        @endif

                                        <div class="col-sm-6">
                                            <div class="has-warning form-group">
                                                <label for="category_image" class="form-control-label">Category Image<span class="text text-primary">*</span></label>
                                                <input type="file" id="category_image" name="category_image" class="form-control-warning form-control">
                                                @error('category_image')
                                                <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            @if($category_image !== '')
                                            <div class="show-cat-img">
                                                <img style="text-align: center; width: 70px;height: 100px;" src="{{asset('storage/media/'.$category_image)}}">
                                            </div>
                                            @else

                                            @endif
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="has-warning form-group">
                                                <label for="is_home" class="form-control-label">Show Home Page<span class="text text-primary">*</span></label>
                                                <input type="checkbox" id="is_home" name="is_home" style="width: 50px;height: 22px;" class="form-control-warning" {{$is_home_select}}>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if($id)
                                    <input type="submit" id="inputError2i" class="btn btn-outline-primary" value="Edit" >
                                    @else
                                    <input type="submit" id="inputError2i" class="btn btn-outline-primary" value="Add" >
                                    @endif
                                    
                                    <input type="hidden" name="id" value="{{$id}}">
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

















