@extends ('layouts.master')
@section ('title','School News Board')
@section('content')

<div class="container-fluid px-4"> <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    Total Categories
                    <h5 class="mt-1">{{$categories}}</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link text-decoration-none" href="{{url('admin/category')}}">
                        View Details
                    </a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    Total Posts
                    <h5 class="mt-1">{{$posts}}</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link text-decoration-none" href="{{url('admin/posts')}}">
                        View Details
                    </a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    Total Users
                    <h5 class="mt-1">{{$users}}</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link text-decoration-none" href="{{url('admin/users')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    Total Admin
                    <h5 class="mt-1">{{$admins}}</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link text-decoration-none" href="{{url('admin/users')}}">
                        View Details
                    </a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection