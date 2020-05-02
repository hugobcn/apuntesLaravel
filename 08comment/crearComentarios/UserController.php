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
    
    
    public function save(Request $request)
    {
        
        //validar datos
        $validate = $this->validate($request,[
            'image_id' => 'integer|required|',
            'content'=> 'string|required',
        ]);

        //recoger datos
        //\Auth::user(); recoger  dato usuario
        $user = \Auth::user();
        $image_id = $request->input('image_id');
        $content = $request->input('content');
        
        //cargar en BBDD
        $comment = new Comment();
        //Asignar nuevos valores a asignar
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;
        
        //guardar datos en BBDD
        $comment -> save();
        
        //redirecion
        return redirect()-> route('image.detail',['id'=>$image_id])
                         -> with(['message'=>'OK, comentario publicado']);
        
        //var_dump($content);
        //var_dump($image_id);
        //die();
                
                
    }
