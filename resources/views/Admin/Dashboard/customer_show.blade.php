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
                        <div class="col-lg-2">
                            <a href="{{route('customer')}}" class="btn btn-primary">Back+</a>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-md-12 mt-5">
                        <!-- DATA TABLE-->
                        <div class="card">
                            <div class="card card-header bg-primary">
                                <h3 class="text-white">Customer Detail</h3>
                            </div>
                           <div class="table-responsive p-3">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td>{{$customers->name}}</td>
                                        </tr>
                                        <tr>
                                           <td><b>E-mail</b></td>
                                            <td>{{$customers->email}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Mobile</b></td>
                                            <td>{{$customers->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>City</b></td>
                                            <td>{{$customers->city}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Password</b></td>
                                            <td>{{$customers->password}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Adress</b></td>
                                            <td>{{$customers->adress}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>State</b></td>
                                            <td>{{$customers->state}}</td>
                                        </tr>

                                        <tr>
                                            <td><b>Zip</b></td>
                                            <td>{{$customers->zip}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Company</b></td>
                                            <td>{{$customers->company}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>gstin</b></td>
                                            <td>{{$customers->gstin}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Status</b></td>
                                            <td>{{$customers->status}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Created At</b></td>
                                            <td>{{\Carbon\Carbon::parse($customers->created_at)->format('m-d-y h:i:s')}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Updated At</b></td>
                                            <td>{{\Carbon\Carbon::parse($customers->updated_at)->format('d-m-y h:i:s')}}</td>
                                        </tr>
                                        @if($customers->image != '')
                                        <tr>
                                            <td><b>Image</b></td>
                                            <td>{{$customers->image}}</td>
                                        </tr>
                                        @endif

                                    </tbody>
                                </table>
                              </div>
                        </div>
                        
                        <!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



