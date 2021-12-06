<!-- layout page  -->
@extends('Admin/Includes/Layout')
<!-- page header title -->
@section('page_title','Size')
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
                                    <li class="list-inline-item">Add Size</li>
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
    <h2 style="margin-left:50px;">Manage Size</h2>
</div>

<div class="back-btn" style="margin-top:30px;">
    <a href="{{route('size')}}">
    <button style="margin-left:50px;" type="button" class="btn btn-primary">Back</button>
    </a>
</div>

<div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header bg-primary text-white text-center">
                                @if($id)
                                <strong>Edit Size</strong> 
                                @else
                                <strong>Add New Size</strong> 
                                @endif
                            </div>
                            <div class="card-body card-block">
                                <form action="{{route('size.manage.process')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="has-success form-group">
                                        <label for="size" class=" form-control-label">Size*</label>
                                        <input type="text" value="{{$size}}" id="size" name="size" class="form-control-success form-control">
                                        @error('size')
                                     <div class="mt-3 alert alert-danger" role="alert">
                                             {{$message}}
										</div>
                                        @enderror
                                    </div>
                                    
                                    @if($id)
                                     <input type="submit" id="inputError2i" class="btn btn-outline-success" value="Edit" >
                                    @else
                                     <input type="submit" id="inputError2i" class="btn btn-outline-success" value="Add" >
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
