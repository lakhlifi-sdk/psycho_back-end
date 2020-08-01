<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use Auth;

class CommentsController extends Controller
{
    public function comments(Request $request){
            $comments = Comment::where('post_id',$request->id)->get();
            foreach($comments as $comment){
                $comment->user;
             return response()->json([
            'success'=>true,
            'comments'=>$comment
            ]);
            }
            
                   
        }
    public function create(Request $request){
    $comment= new Comment;
    $comment->user_id=Auth::user()->id;
    $comment->post_id=$request->id;
    $comment->comment=$request->comment;
    $comment->save();
    return response()->json([
    'succes'=>true,
    
    ]);
    }
    

    public function update(Request $request){
        $comment =Comment::find($request->id);
        if(Auth::user()->id=$comment->user_id){
            $comment->comment=$request->comment;
            $comment->update();
            return response()->json([
                'succes'=>true,
                'message'=>'comment is updated'
                
    ]);              
        }else{
        return response()->json([
                'succes'=>true,
                'message'=>'comment not updated'
    ]);            
        }
    }

    public function delete(Request $request){
        $comment =Comment::find($request->id);
        if(Auth::user()->id=$comment->user_id){
            
            $comment->delete();
            return response()->json([
                'succes'=>true,
                'message'=>'comment is deleted'
                
    ]);              
        }else{
        return response()->json([
                'succes'=>true,
                'message'=>'comment not deleted'
    ]);            
        }
    }
}
