 <!--chequear si usuario ha dado like imagen-->
                        <?php $user_like = false; ?>
                        @foreach($image->likes as $like)
                        @if($like->user->id == Auth::user()->id)
                        <?php $user_like = true; ?>
                        @endif
                        @endforeach

 <!-- si usuario existe y es el quie lo ha creado-->
                    <!-- https://getbootstrap.com/docs/4.0/components/modal/ -->
                    @if(Auth::user() &&  Auth::user()->id == $image->user->id)
                    <div class="action">


 @if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))


@if(Auth::user()->image)
  <div class="container-avatar2">
      <!--<img src="{{url('user/avatar/'.Auth::user()->image)}}"></img>-->
    <img  src="{{route('user.avatar',['filename'=>Auth::user()->image])}}" class="avatar2"/>   
  </div>
  @endif


 <!--chequear si usuario ha dado like imagen-->
            <?php $user_like = false; ?>
            @foreach($image->likes as $like)
            @if($like->user->id == Auth::user()->id)
            <?php $user_like = true; ?>
            @endif
            @endforeach

            @if($user_like)
            <!-- data-id="{{$image->id}}"  para gestionar  mediante ajax-->
            <img  src="{{asset('img/heart-red.png')}}" data-id="{{$image->id}}"  class="btn-dislike"/>
            @else
            <img  src="{{asset('img/heart-black.png')}}" data-id="{{$image->id}}"  class="btn-like"/>
            @endif


  <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))




    <!--li final añadido-->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  
                                      <!-- Inico pestanya dropout añadido -->
                                    
                                    <a class="dropdown-item" href="{{ route('profile',['id'=> Auth::user()->id]) }}">
                                       Mi perfil
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('config') }}">
                                       Configuracion
                                    </a>
                                    
                                    <!-- final pestanya dropout añadido -->
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                  
                                </div>
                            </li>
                        @endguest

