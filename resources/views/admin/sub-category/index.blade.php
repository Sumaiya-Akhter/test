 @extends('admin.master')
 @section('content')
     <div class="app-content main-content mt-0">
         <div class="side-app">
             <!-- CONTAINER -->
             <div class="main-container container-fluid">
                 <!-- PAGE-HEADER -->
                 <div class="page-header">
                     <div>
                         <h1 class="page-title">Sub Category Add</h1>
                     </div>
                     <div class="ms-auto pageheader-btn">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Sub Category Add</li>
                         </ol>
                     </div>
                 </div>
                 <!-- PAGE-HEADER END -->

                 <!-- ROW -->
                 <div class="row">
                     <div class="col-lg-12 col-md-12">
                         <div class="card">
                             <div class="card-header border-bottom">
                                 <h3 class="card-title">Sub Category Add</h3>
                             </div>
                             <div class="card-body">
                                 <p class="text-success text-center">{{session('message')}}</p>

                                 <form class="needs-validation"  action="{{route('subCategory.create')}}" method="POST">
                                     @csrf

                                     <div class="form-row">
                                         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                             <label for="validationCustom011">Category</label>
                                             <select name="category_id" required class="form-control">
                                                 <option value="" disabled selected>Select Category</option>
                                                 @foreach($categories as $category)
                                                     <option value="{{$category->id}}">{{$category->name}}</option>
                                                 @endforeach
                                             </select>
                                             <p class="text-danger mt-2">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</p>
                                         </div>
                                     </div>
                                     <div class="form-row">
                                         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                             <label for="validationCustom011">Sub Category name</label>
                                             <input type="text" class="form-control" name="name" id="validationCustom011" value="">
                                             <p class="text-danger mt-2">{{$errors->has('name') ? $errors->first('name') : ''}}</p>
                                         </div>
                                     </div>
                                     <button class="btn btn-primary" type="submit">Submit form</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
