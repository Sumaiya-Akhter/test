@extends('admin.master')
<!-- PAGE -->
@section('content')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Product</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product Manage</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Product</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom"  >
                                        <tbody>
                                            <tr>
                                                <th>Product Name</th>
                                                <td>{{$product->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Product Code</th>
                                                <td>{{$product->code}}</td>
                                            </tr>
                                            <tr>
                                                <th>Category Name</th>
                                                <td>{{$product->category->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Sub Category Name</th>
                                                <td>{{$product->sub_category->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Brand Name</th>
                                                <td>{{$product->brand->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Unit</th>
                                                <td>{{$product->unit->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Regular Price</th>
                                                <td>{{$product->regular_price}}</td>
                                            </tr>
                                            <tr>
                                                <th>Selling Price</th>
                                                <td>{{$product->selling_price}}</td>
                                            </tr>
                                            <tr>
                                                <th>Stock Amount</th>
                                                <td>{{$product->stock_amount}}</td>
                                            </tr>
                                            <tr>
                                                <th>Reorder Label</th>
                                                <td>{{$product->reorder_label}}</td>
                                            </tr>
                                            <tr>
                                                <th>Short Description</th>
                                                <td>{{$product->short_description}}</td>
                                            </tr>
                                            <tr>
                                                <th>Long Description</th>
                                                <td> {!! $product->long_description !!} </td>
                                            </tr>
                                            <tr>
                                                <th>Image</th>
                                                <td>
                                                    <img src="{{asset($product->image)}}" width="100" height="100" alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Other Images</th>
                                                <td>
                                                    @foreach($product->othersImage as $otherImage)
                                                        <img src="{{asset($otherImage->image)}}" width="100" height="100" alt="Product Other Image" > &nbsp;
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Feature Status</th>
                                                <td>
                                                    {{$product->featured_status == 1 ? 'New arrival' : 'Explore'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>
                                                    {{$product->status == 1 ? 'Active' : 'Inactive'}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
