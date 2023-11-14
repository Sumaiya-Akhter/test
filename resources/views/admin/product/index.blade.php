 @extends('admin.master')
 @section('content')
     <div class="app-content main-content mt-0">
         <div class="side-app">
             <!-- CONTAINER -->
             <div class="main-container container-fluid">
                 <!-- PAGE-HEADER -->
                 <div class="page-header">
                     <div>
                         <h1 class="page-title">Product Add</h1>
                     </div>
                     <div class="ms-auto pageheader-btn">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Product Add</li>
                         </ol>
                     </div>
                 </div>
                 <!-- PAGE-HEADER END -->

                 <!-- ROW -->
                 <div class="row">
                     <div class="col-lg-12 col-md-12">
                         <div class="card">
                             <div class="card-header border-bottom">
                                 <h3 class="card-title">Product Add</h3>
                             </div>
                             <div class="card-body">
                                 <p class="text-success">{{session('message')}}</p>

                                 <form class="needs-validation"  action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     <div class="form-row">
                                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                             <label for="category_id">Category name</label>
                                             <select name="category_id" id="category_id" required class="form-control" onchange="getSubCategoryByCategory(this.value)">
                                                 <option value="" disabled selected>Select Category</option>
                                                 @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                 @endforeach
                                             </select>
                                             <p class="text-danger mt-2">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</p>
                                         </div>
                                     </div>
                                     <div class="form-row">
                                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                             <label for="sub_category_id">Sub Category name</label>
                                             <select name="sub_category_id" id="sub_category_id" required class="form-control">
                                                 <option value="">Select Sub Category</option>

                                             </select>
                                             <p class="text-danger mt-2">{{$errors->has('sub_category_id') ? $errors->first('sub_category_id') : ''}}</p>

                                         </div>
                                     </div>

                                     <div class="form-row">
                                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                             <label for="brand_id">Brand Name</label>
                                             <select name="brand_id" id="brand_id" required class="form-control">
                                                 <option value="" selected disabled>Select Brand</option>
                                                 @foreach($brands as $brand)
                                                     <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                 @endforeach
                                             </select>
                                             <p class="text-danger mt-2">{{$errors->has('brand_id') ? $errors->first('brand_id') : ''}}</p>

                                         </div>
                                     </div>
                                     <div class="form-row">
                                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                             <label for="unit_id">Unit </label>
                                             <select name="unit_id" id="unit_id" required class="form-control">
                                                 <option value="" selected disabled>Select Unit</option>
                                                 @foreach($units as $unit)
                                                     <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                 @endforeach
                                             </select>
                                             <p class="text-danger mt-2">{{$errors->has('unit_id') ? $errors->first('unit_id') : ''}}</p>

                                         </div>
                                     </div>

                                     <div class="form-row">
                                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                             <label for="name">Product Name</label>
                                             <input type="text" name="name" id="name" placeholder="Product Name" class="form-control">

                                         </div>
                                     </div>
                                     <div class="form-row">
                                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                             <label for="code">Product Code</label>
                                             <input type="text" name="code" id="code" placeholder="Product Code" class="form-control">
                                             <p class="text-danger mt-2">{{$errors->has('code') ? $errors->first('code') : ''}}</p>
                                         </div>
                                     </div>

                                     <div class="form-row">
                                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                             <label for="product_price">Product Price</label>
                                             <div class="input-group">
                                                 <input type="number" id="product_price" name="regular_price" placeholder="Regular Price" class="form-control">
                                                 <input type="number" id="product_price" name="selling_price" placeholder="Selling Price" class="form-control">
                                             </div>
                                             <p class="text-danger mt-2">{{$errors->has('regular_price') ? $errors->first('regular_price') : ''}}</p>
                                             <p class="text-danger mt-2">{{$errors->has('regular_price') ? $errors->first('selling_price') : ''}}</p>
                                         </div>
                                     </div>
                                     <div class="form-row">
                                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                             <label for="stock_status">Stock Status</label>
                                             <div class="input-group">
                                                 <input type="number" id="stock_status" name="stock_amount" placeholder="Stock Amount" class="form-control">
                                                 <input type="number" id="stock_status" name="reorder_label" placeholder="Reorder Label" class="form-control">
                                             </div>
                                             <p class="text-danger mt-2">{{$errors->has('stock_amount') ? $errors->first('regular_price') : ''}}</p>
                                             <p class="text-danger mt-2">{{$errors->has('reorder_label') ? $errors->first('selling_price') : ''}}</p>
                                         </div>
                                     </div>
                                     <div class="form-row">
                                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                             <label for="image">Image</label>
                                             <input type="file"  accept="image/*" class="form-control" name="image" id="image"  >
                                         </div>
                                     </div>

                                     <div class="form-row">
                                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                             <label for="others_image">Others Image</label>
                                             <input type="file" accept="image/*" id="others_image" name="others_image[]"  class="form-control" multiple required>
                                         </div>
                                     </div>

                                     <div class="form-row">
                                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                             <label for="short_description">Short Description</label>
                                             <textarea name="short_description" id="short_description" class="form-control" placeholder="Unit Description" cols="30" rows="5"></textarea>
                                         </div>
                                     </div>
                                     <div class="form-row">
                                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                             <label for="summernote">Long Description</label>
                                             <textarea name="long_description" id="summernote" class="form-control" placeholder="Unit Description" cols="30" rows="5"></textarea>
                                         </div>
                                     </div>

                                     <button class="btn btn-primary" type="submit">Save Product</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
