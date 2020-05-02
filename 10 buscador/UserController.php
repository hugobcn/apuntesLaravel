Route::get('/gente/{search?}', 'UserController@index')->name('user.index');
Route::get('/perfil/{id}', 'UserController@profile')->name('profile');

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
    //solo personal autorizado
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    //gente
     public function index($search = null) 
    {
        //extraer todos los usuarios
        //$users =User::all();
        //extraer todos los usuarios con orden y paginador
         
        if (!empty($search)) {
            //where( nick LIKE %search% )
            $users = User::where('nick','LIKE','%'.$search.'%')
                    ->orWhere('name','LIKE','%'.$search.'%')
                    ->orderBy('id','desc')
                    ->paginate(5);
        } else {
             $users = User::orderBy('id','desc')->paginate(5);
        }
         
        
        
        return view('user.index',['users'=>$users]);
    }
    
    
    
    
    
    
    
    public function  profile($id)
    {
        $user =User::find($id);
        
        return view ('user.profile',['user'=>$user]);
        
    }
    
   
}
