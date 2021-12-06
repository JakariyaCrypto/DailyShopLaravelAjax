<!-- layout page  -->
@extends('Admin/Includes/Layout')
<!-- page header title -->
@section('page_title','Banner')
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

<!-- add Banner content -->
@section('content')
<div class="contetn-title">
    <h2 style="margin-left:50px;">Manage Banner</h2>
</div>

<div class="back-btn" style="margin-top:30px;">
    <a href="{{route('banner')}}">
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
                                <strong>Edit Banner</strong> 
                                @else
                                <strong>Add New Banner</strong> 
                                @endif
                            </div>
                            <div class="card-body card-block">
                                <form action="{{route('banner.manage.process')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="has-success form-group">
                                                <label for="title" class=" form-control-label">Banner Title*</label>
                                                <input type="text" value="{{$title}}" id="title" name="title" class="form-control-success form-control">
                                                @error('title')
                                                <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="has-warning form-group">
                                                <label for="category_slug" class="form-control-label">Save Up*</label>
                                                <input type="text" value="{{$save_up}}" id="save_up" name="save_up" class="form-control-warning form-control">
                                                @error('save_up')
                                                <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="has-warning form-group">
                                                <label for="short_desc" class="form-control-label">Short Description*</label>
                                                <input type="text" value="{{$short_desc}}" id="short_desc" name="short_desc" class="form-control-warning form-control">
                                                @error('short_desc')
                                                <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                      
                                        <div class="col-sm-6">
                                            <div class="has-warning form-group">
                                                <label for="short_desc" class="form-control-label">Button Name*</label>
                                                <input type="text" value="{{$button}}" id="button" name="button" class="form-control-warning form-control">
                                                @error('button')
                                                <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="has-warning form-group">
                                                <label for="short_desc" class="form-control-label">Button Link*</label>
                                                <input type="text" value="{{$link}}" id="link" name="link" class="form-control-warning form-control">
                                                @error('link')
                                                <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="has-warning form-group">
                                                <label for="image" class="form-control-label">Banner Image<span class="text text-primary">*</span></label>
                                                <input type="file" id="image" name="image" class="form-control-warning form-control">
                                                @error('image')
                                                <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            @if($image !== '')
                                            <div class="show-cat-img">
                                                <img style="text-align: center; width: 70px;height: 100px;" src="{{asset('storage/media/'.$image)}}">
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

















