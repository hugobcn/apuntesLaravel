 public function __construct()
    {
        $this->middleware('auth');
    }


//\Auth::user(); recoger  dato usuario
        $user = \Auth::user();
       
        
        //cargar en BBDD
        //Asignar nuevos valores a asignar
        $comment->user_id = $user->id;

// Comprobar si soy el dueño del  comentario o imagen
        if($user && ($comment -> user_id == $user->id || $comment->image->user_id == $user->id)){

//condicion & eliminacion Imagen & assoc
        if ($user && $image && $image->user->id == $user->id) {

if ($user && $image && $image->user->id == $user->id) {


  $user = \Auth::user();
		$likes = Like::where('user_id', $user->id)
                        ->orderBy('id', 'desc')
                        ->paginate(5);
    
