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




class UserController extends Controller
{

 public function  profile($id)
    {
        $user =User::find($id);
        
        return view ('user.profile',['user'=>$user]);
        
    }
