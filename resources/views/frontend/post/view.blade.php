@extends ('layouts.app')

@section('title',"$post->meta_title" )
@section('meta_description',"$post->meta_description" )
@section('meta_keyword',"$post->meta_keyword" )

@section ('content')

<div class="py-4">
    <div class="container">
        <div class="row">

            <div class="col-md-8">

                <div class="category-heading">
                    <h4 class="mb-0">{!! $post->name !!}</h4>
                </div>

                <div class="mt-3">
                    <h6>{{$post->category->name.' / '. $post->name}}</h6>
                </div>
                <div class="card card-shadow mt-4 mb-4">
                    <div class="card-body post-decription">

                        {!! $post->description !!}
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mt-1">

                    <div class="card-header">
                        <h4>Latest Posts</h4>
                    </div>

                    <div class="card-body">

                        @foreach ($latest_posts as $latest_post_item)
                        <a href="{{ url('event/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-decoration-none">
                            <h6>{{'> '.$latest_post_item->name}}</h6>
                        </a>
                        @endforeach

                    </div>

                </div>
            </div>

            <div class="col-md-8">
                <div class="comment-area">

                    @if (session('message'))
                    <h6 class="alert alert-warning mb-3">{{session('message')}}</h6>
                    @endif

                    <div class="card card-body">
                        <h6 class="card-tite">Leave a Comment</h6>
                        <form action="{{url('comments')}}" method="POST">
                            @csrf
                            <input type="hidden" name="post_slug" value="{{$post->slug}}">
                            <textarea name="comment_body" class="form-control" rows="3"></textarea>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>

                    @forelse ($post -> comments as $comment)
                    <div class="comment-container card card-body shadow-sm mt-2">
                        <div class="detail-area">
                            <h6 class="user-name mb-1">
                                @if($comment->user)
                                {{$comment->user->name}}
                                @endif
                                <small class="ms-3 text-primary">Commented On:{{$comment->created_at->format('d-m-y')}}</small>
                            </h6>
                            <p class="user-comment mb-1">
                                {!! $comment -> comment_body !!}
                            </p>
                        </div>

                        @if (Auth::check() && Auth::id() == $comment->user_id)
                        <div>

                            <button type="button" value="{{$comment->id}}" class="deleteComment btn btn-danger">Delete</button>
                        </div>
                        @endif

                    </div>
                    @empty

                    <div class="card card-body shadow-sm mt-3">

                        <h4 class="mt-2 mb-2">Be the first to Comment</h4>

                    </div>

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('scripts')

<script>
    $(document).ready(function() {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(document).on('click', '.deleteComment', function() {
            if (confirm('Ar you sure you want to delete this comment?')) {

                var thisClicked = $(this);
                var comment_id = thisClicked.val();

                $.ajax({
                    type: "POST",
                    url: "/delete-comment",
                    data: {
                        'comment_id': comment_id
                    },

                    success: function(res) {
                        if (res.status == 200) {
                            thisClicked.closest('.comment-container').remove();
                            alert(res.message);
                        } else {
                            alert(res.message);
                        }
                    }
                });
            }

        });
    });
</script>

@endsection