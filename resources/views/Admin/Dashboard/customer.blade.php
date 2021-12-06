@extends('Admin/Includes/Layout')
<!-- active menu -->
@section('brand_select','active')
<!-- page header title -->
@section('page_title','Customer')
<!-- page header down title -->
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
                                    <li class="list-inline-item">Manage </li>
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

<div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>name</th>
                                        <th>Phone</th>
                                        <th>Gmail</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($result as $list)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$list->name}}</td>
                                        <td>{{$list->email}}</td>
                                        <td>{{$list->mobile}}</td>

                                        @if($list->status == 'customer')
                                        <td class="text-success">{{$list->status}}</td>
                                         @elseif($list->status == 'user')
                                         <td class="text-danger">{{$list->status}}</td>
                                         @endif
                                        
                                        <td>
<!--                                             @if($list->status == 'customer')
                                                <a href="{{url('admin/brand/status/Inactive')}}/{{$list->id}}">
                                                    <i style="padding:8px;font-size:20px;background:#f2f2f2;" class="bg-success text-white fas fa-arrow-up"></i>
                                                </a>
                                            @elseif($list->status == 'user')
                                                <a href="{{url('admin/brand/status/Active')}}/{{$list->id}}">
                                                    <i style="padding:8px;font-size:20px;" class="bg-warning text-white fas fa-arrow-down"></i>
                                                </a>
                                            @endif -->
                                            

                                            <a href="{{url('admin/customer/show')}}/{{$list->id}}">
                                                <i style="padding:8px;font-size:20px;background:#f2f2f2;" class="text-primary fas fa-eye"></i>
                                            </a>
                                            <a href="{{url('admin/customer/delete')}}/{{$list->id}}">
                                                <i style="color:red;padding:8px;font-size:20px;background:#f2f2f2;" class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



