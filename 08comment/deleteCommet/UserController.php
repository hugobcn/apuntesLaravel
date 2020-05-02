Route::post('/comment/save', 'CommentController@save')->name('comment.save');

App/


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//cargar Modelo para BBDD
use App\Comment;

class CommentController extends Controller
{
    
    //solo personal autorizado
    public function __construct()
    {
        $this->middleware('auth');
    }
    
   
    public function delete($id) {
        //conseguir usuario logueado
        $user = \Auth::user();
        
        //conseguir objeto del comentario
        //find conseguir objeto de ese registro
        $comment = Comment::find($id);
        
        // Comprobar si soy el dueño del  comentario o imagen
        if($user && ($comment -> user_id == $user->id || $comment->image->user_id == $user->id)){
            //borrado comentario
            $comment-> delete();
            
            //redirecion
        return redirect()-> route('image.detail',['id'=>$comment->image->id])
                         -> with(['message'=>'OK, comentario borrado']);
        }else{
            //redirecion
        return redirect()-> route('image.detail',['id'=>$comment->image->id])
                         -> with(['message'=>'KO, comentario NO borrado']);
        }
    }
