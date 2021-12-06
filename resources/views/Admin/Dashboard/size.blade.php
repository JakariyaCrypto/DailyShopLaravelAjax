@extends('Admin/Includes/Layout')
<!-- active menu -->
@section('size_select','active')
<!-- page header title -->
@section('page_title','Size')
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
                                    <li class="list-inline-item">Manage Size</li>
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
                        <div class="col-lg-2">
                            <a href="{{route('add.size')}}" class="btn btn-primary">Add Size+</a>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-md-12 mt-5">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Size</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $list)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$list->size}}</td>

                                        @if($list->status == 'Active')
                                        <td class="text-success">{{$list->status}}</td>
                                         @elseif($list->status == 'Inactive')
                                         <td class="text-danger">{{$list->status}}</td>
                                         @endif
                                        
                                        <td>
                                            @if($list->status == 'Active')
                                                <a href="{{url('admin/size/status/Inactive')}}/{{$list->id}}">
                                                    <i style="padding:8px;font-size:20px;background:#f2f2f2;" class="bg-success text-white fas fa-arrow-up"></i>
                                                </a>
                                            @elseif($list->status == 'Inactive')
                                                <a href="{{url('admin/size/status/Active')}}/{{$list->id}}">
                                                    <i style="padding:8px;font-size:20px;" class="bg-warning text-white fas fa-arrow-down"></i>
                                                </a>
                                            @endif
                                            

                                            <a href="{{url('admin/size/manage/size')}}/{{$list->id}}">
                                                <i style="padding:8px;font-size:20px;background:#f2f2f2;" class="text-primary fas fa-edit"></i>
                                            </a>
                                            <a href="{{url('admin/size/delete')}}/{{$list->id}}">
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



