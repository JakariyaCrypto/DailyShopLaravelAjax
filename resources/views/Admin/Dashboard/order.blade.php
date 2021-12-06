@extends('Admin/Includes/Layout')
<!-- active menu -->
@section('order_select','active')
<!-- page header title -->
@section('page_title','Order')
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
                                    <li class="list-inline-item">Manage Order</li>
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
                                        <th>View</th>
                                        <th>Customer</th>
                                        <th>Amount</th>
                                        <th>Order Status</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $list)
                                    <tr>
                                        <td><a class="btn btn-primary" href="{{url('admin/order_details')}}/{{$list->id}}">view</a></td>
                                        <td>{{$list->name}}</td>
                                        <td>{{$list->total_amount}}</td>
                                        
                                        @if($list->order_status == 1)
                                        <td class="text-success"><span>Placed</span></td>
                                         @elseif($list->order_status == 2)
                                         <td class="text-danger">Pendding</td>
                                         @endif
                                        <td>{{$list->payment_status}}</td>
                                        <td>

                                            

                                            <a href="{{url('admin/color/manage/color')}}/{{$list->id}}">
                                                <i style="padding:8px;font-size:20px;background:#f2f2f2;" class="text-primary fas fa-edit"></i>
                                            </a>
                                            <a href="{{url('admin/color/delete')}}/{{$list->id}}">
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



