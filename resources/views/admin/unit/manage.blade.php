@extends('admin.master')
@section('content')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Unit</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Unit</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Unit Manage</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Unit</h3>
                            </div>
                            <div class="card-body">
                                <p class="text-success">{{session('message')}}</p>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                        <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">Sl</th>
                                            <th class="wd-15p border-bottom-0">Unit Name</th>
                                            <th class="wd-15p border-bottom-0">Description</th>
                                            <th class="wd-15p border-bottom-0">Status</th>
                                            <th class="wd-20p border-bottom-0">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($units as $unit)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$unit->name}}</td>
                                                <td>{{$unit->description}}</td>
                                                <td>{{$unit->status == 1 ? 'Active' : 'Inactive'}}</td>

                                                <td class="d-flex">
                                                    <a href="{{route('unit.edit',$unit->id)}}" class="btn btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <form action="{{route('unit.destroy',$unit->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
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
