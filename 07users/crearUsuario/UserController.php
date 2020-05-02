App/


<?php

namespace App\Http\Controllers;
//trbajar BBDD
use Illuminate\Http\Request;
//almacenar datos e imagen en disco
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
//extraer foto
use Illuminate\Http\Response;
//cargar modelo
use App\User;


public function config(){
        return view('user.config');
    }
    
    
    public function update (Request $request){
        //subirImagen prueba
        //$image_path = $request-> file('image_path');
        //var_dump($image_path);
        //die();
        
        //para validar nick igual que el suyo
        //unique:users,nick,'.$id, otro nick o solo el mimso del registro
        //consegui usuario identificado
        $user = \Auth::user();
        $id =  $user->id;
        
        //validacion formulario
        $validate = $this->validate($request,[
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:users,nick,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id        
        ]);
        
        //recoger datos del formulario       
        $name = $request->input('name');
        $surname = $request-> input('surname');
        $nick = $request-> input('nick');
        $email = $request-> input('email');
        
        
        //asignar nuevos valores  al objeto del usuario
        $user -> name =$name;
        $user -> surname = $surname;
        $user -> nick = $nick;
        $user -> email = $email;
        
        //subirImagen
       $image_path = $request-> file('image_path');
       if($image_path){
           //Poner nombre: time() imagen unica  y getClientOriginalName() obtener nombre
           $image_path_name = time().$image_path->getClientOriginalName();
           
           //Guardar imagen en (storage/app/users)
           Storage::disk('users')->put($image_path_name,File::get($image_path));
           
           //seteo el nombre  de la imagen  en el objeto
           $user->image = $image_path_name;           
       }
        
        
        //ejecutar consulta y cambios en BBDD
        $user->update();
        
        //redirrecion 
        return redirect ()->route('config')->with(['message'=>'Ok, usuario actualizado']);
        
        //var_dump($id);
        //var_dump($name);
        //var_dump($surname);
        
        //die();
    }
