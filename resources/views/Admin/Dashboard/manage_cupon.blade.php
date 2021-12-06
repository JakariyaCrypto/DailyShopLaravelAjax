<!-- layout page  -->
@extends('Admin/Includes/Layout')
<!-- page header title -->
@section('page_title','Cupon')
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
                                    <li class="list-inline-item">Add Cupon</li>
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
    <h2 style="margin-left:50px;">Manage Cupon</h2>
</div>

<div class="back-btn" style="margin-top:30px;">
    <a href="{{route('cupon')}}">
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
                                <strong>Edit Cupon</strong> 
                                @else
                                <strong>Add New Cupon</strong> 
                                @endif
                            </div>
                            <div class="card-body card-block">
                                <form action="{{route('cupon.manage.process')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="has-success form-group">
                                                <label for="title" class=" form-control-label">Cupon title*</label>
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
                                                <label for="code" class="form-control-label">Cupon code*</label>
                                                <input type="text" value="{{$code}}" id="code" name="code" class="form-control-warning form-control">
                                                @error('code')
                                                <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="has-warning form-group">
                                                <label for="value" class="form-control-label">Cupon value*</label>
                                                <input type="text" value="{{$value}}" id="value" name="value" class="form-control-warning form-control">
                                                @error('value')
                                                <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="has-warning form-group">
                                                <label for="code" class="form-control-label">Cupon code*</label>
                                                <select value="{{$type}}" id="type" name="type" class="form-control-warning form-control">
                                                @if($type == 'value')
                                                  <option value="value" slected>Value</option> 
                                                  <option value="per">Per</option> 
                                                 @elseif($type == 'per')
                                                  <option value="value" >Value</option> 
                                                  <option value="per" selected>Per</option>
                                                  @else
                                                  <option value="value" >Value</option> 
                                                  <option value="per">Per</option>
                                                  @endif 
                                                </select>
                                                @error('code')
                                                <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="has-warning form-group">
                                                <label for="value" class="form-control-label">Min Order Amount*</label>
                                                <input type="text" value="{{$min_order_amt}}" id="min_order_amt" name="min_order_amt" class="form-control-warning form-control">
                                                @error('min_order_amt')
                                                <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="has-warning form-group">
                                                <label for="code" class="form-control-label">is One Time*</label>
                                                <select value="{{$is_one_time}}" id="is_one_time" name="is_one_time" class="form-control-warning form-control">
                                                @if($is_one_time == '1')
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                                @else
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                                @endif
                                                </select>
                                                @error('is_one_time')
                                                <div class="mt-3 alert alert-danger" role="alert">
                                                     {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>


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
