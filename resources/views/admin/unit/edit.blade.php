 @extends('admin.master')
 @section('content')
     <div class="app-content main-content mt-0">
         <div class="side-app">
             <!-- CONTAINER -->
             <div class="main-container container-fluid">
                 <!-- PAGE-HEADER -->
                 <div class="page-header">
                     <div>
                         <h1 class="page-title">Unit Edit</h1>
                     </div>
                     <div class="ms-auto pageheader-btn">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="javascript:void(0);">Unit</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Unit Edit</li>
                         </ol>
                     </div>
                 </div>
                 <!-- PAGE-HEADER END -->

                 <!-- ROW -->
                 <div class="row">
                     <div class="col-lg-12 col-md-12">
                         <div class="card">
                             <div class="card-header border-bottom">
                                 <h3 class="card-title">Unit Add</h3>
                             </div>
                             <div class="card-body">
                                 <p class="text-success">{{session('message')}}</p>

                                 <form class="needs-validation"  action="{{route('unit.update',$unit->id)}}" method="POST">
                                     @csrf
                                     @method('PUT')
                                     <div class="form-row">
                                         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                             <label for="validationCustom011">Unit name</label>
                                             <input type="text" class="form-control" name="name" value="{{$unit->name}}" id="validationCustom011" required>
                                             <p class="text-danger mt-2">{{$errors->has('name') ? $errors->first('name') : ''}}</p>
                                         </div>
                                     </div>
                                     <div class="form-row">
                                         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                             <label for="validationCustom011">Description</label>
                                            <textarea name="description" class="form-control" placeholder="Unit Description" cols="30" rows="5"> {{$unit->description}} </textarea>
                                         </div>
                                     </div>

                                     <div class="form-row">
                                         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                             <label for="validationCustom011">Status</label>
                                             <select name="status" class="form-control">
                                                 <option value="1" {{$unit->status == 1 ? 'selected' : ''}}>Active</option>
                                                 <option value="0" {{$unit->status == 0 ? 'selected' : ''}}>Inactive</option>
                                             </select>
                                         </div>
                                     </div>

                                     <button class="btn btn-primary" type="submit">Update</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
