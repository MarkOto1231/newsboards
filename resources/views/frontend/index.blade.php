@extends('layouts.app')

@section('title',"SCHOOL NEWS BOARD SNSU" )
@section('meta_description',"SCHOOL NEWS BOARD SNSU" )
@section('meta_keyword',"SCHOOL NEWS BOARD SNSU" )

@section('content')
    
<div class="bg-success py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel category-carousel owl-theme">
                
                    @foreach ($all_categories as $all_cate_item)
                    <div class="item mt-3 mb-3">
                        <a href="{{ url('event/'.$all_cate_item->slug)}}" class="text-decoration-none">
                            <div class="card">
                                <img style="height: 200px;" src="{{asset('uploads/category/'.$all_cate_item->image)}}" alt="image">
                                <div class="card-body text-center ">
                                <h4>{{Str::title($all_cate_item->name)}}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-1 bg-gray">
    <div class="container">
        <div class="text-center p-3">
            

        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12"></div>
                <h4>SCHOOL NEWS BOARD</h4>
                <div class="underline"></div>

                    <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    
                    </p>

        </div>
    </div>
</div>


<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>All Categories</h4>
                <div class="underline"></div>
            </div>
            
            @foreach ($all_categories as $all_cate_item)
                    <div class="col-md-3">
                        <div class="card card-body mb-3">
                            <a href="{{ url('event/'.$all_cate_item->slug)}}" class="text-decoration-none">
                                <h4 class="text-dark mb-0">{{Str::title($all_cate_item->name)}}</h4>
                            </a>
                        </div>
                    </div>
                    
            @endforeach

                
        </div>
    </div>
</div>

<div class="py-5 bg-White">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Latest Post</h4>
                <div class="underline"></div>
            </div>

            <div class="col-md-8">
            @foreach ($latest_posts as $latest_post_item)
                    
                <div class="card card-body shadow mb-3" style="background-color: #ddd;">
                    <a href="{{ url('event/'.$latest_post_item->category->slug .'/'. $latest_post_item->slug)}}" class="text-decoration-none">
                        <h4 class="text-dark mb-0">{{Str::title($latest_post_item->name)}}</h4>
                    </a>

                    <h6>Posted On:{{$latest_post_item->created_at->format('d/m/Y')}}
                        <span class="ms-3">Posted By:{{$latest_post_item->user->name}}</span>
                        </h6>

                </div>
                      
            @endforeach

            </div>

            <div class="col-md-4">
                <div class="text-center p-3">
                <h3>Advertise</h3>
                </div>
            </div>
            
        </div>
    </div>
</div>


@endsection