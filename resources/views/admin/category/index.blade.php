 @extends('admin.master')
 @section('content')
     <div class="app-content main-content mt-0">
         <div class="side-app">
             <!-- CONTAINER -->
             <div class="main-container container-fluid">
                 <!-- PAGE-HEADER -->
                 <div class="page-header">
                     <div>
                         <h1 class="page-title">Category Add</h1>
                     </div>
                     <div class="ms-auto pageheader-btn">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Category Add</li>
                         </ol>
                     </div>
                 </div>
                 <!-- PAGE-HEADER END -->

                 <!-- ROW -->
                 <div class="row">
                     <div class="col-lg-12 col-md-12">
                         <div class="card">
                             <div class="card-header border-bottom">
                                 <h3 class="card-title">Category Add</h3>
                             </div>
                             <div class="card-body">
                                 <p class="text-success">{{session('message')}}</p>

                                 <form class="needs-validation"  action="{{route('category.create')}}" method="POST">
                                     @csrf

                                     <div class="form-row">
                                         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                             <label for="category_name">Category name</label>
                                             <input type="text" class="form-control" name="name" id="category_nameasdfas" value="">
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
