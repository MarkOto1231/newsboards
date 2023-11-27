<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $post = Post::where('slug',$request->post_slug)->where('status','0')->first();
            if($post)
            {
                $validator = Validator::make($request->all(),[
                    'comment_body' => 'required|string'       
                ]);

                if($validator->fails())
                {
                    return redirect()->back()->with('message','Comment Area is Mandatory');
                }
                Comment::create([
                    'post_id' => $post ->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);
                return redirect()->back()->with('message','Commented Successfuly');
            }
            else
            {
               return redirect()->back()->with('message','No Such Post Found');
            }
        }
        else
        {
           return redirect('login')->with('message','Login First to comment');
        }
    }

    public function destroy(Request $request)
    {
        if (Auth::check()) 
        {
            $comment = Comment::where('id',$request->comment_id)
                        ->where('user_id',Auth::user()->id)->first();
            $comment->delete();

            return response()->json([
                'status' => 200,
                'message' =>'Comment Deleted Successfully'
            ]);
        } 
        else {
            return response()->json([
                'status' => 401,
                'message' =>'Login to delete this comment'
            ]);
        }
    }
    
}
