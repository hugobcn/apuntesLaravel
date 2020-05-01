App/


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//utilizar modelo
use App\Image;
use App\Comment;
use App\Like;
//guardarImagen
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
//para getName
use Illuminate\Http\Response;

class ImageController extends Controller {

   

    public function save(Request $request) {
  

        return redirect()->route('home')->with(['message' => 'OK, foto subida']);


        
    }

   
    //eliminar imagen & asociados
    public function delete($id) {

       

        //condicion & eliminacion Imagen & assoc
        if ($user && $image && $image->user->id == $user->id) {
            

            $message = array('message' => 'Ok,imagen borrada');
        } else {
            $message = array('message' => 'KO,imagen no borrada');
        }

        //redirecion
        return redirect()->route('home')->with($message);
    }

    
}
