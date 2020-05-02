
                <div class="card-header">Configuracion de mi cuenta</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                            
                            </div>
                        </div>
                        
                        <!--creadoApellidoV01 -->
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ Auth::user()->surname }}" required autocomplete="name" autofocus>

                               
                            </div>
                        </div>
                        
                         <!--creadoNickV01 -->
                        <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('Nick') }}</label>

                            <div class="col-md-6">
                                <input id="nick" type="text" class="form-control @error('nick') is-invalid @enderror" name="nick" value="{{ Auth::user()->nick }}" required autocomplete="nick" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                            
                            </div>
                        </div>
                         
                         <div class="form-group row">
                             <!--cargar imagen avatar amb asirven, 2 mas elegante-->
                             @if(Auth::user()->image)
                            <!--<img src="{{url('user/avatar/'.Auth::user()->image)}}"></img>-->
                            <img src="{{route('user.avatar',['filename'=>Auth::user()->image])}}" class="avatar"/>
                             @endif
                         </div>
                         
                         
                         
                         
                         <!--inicio subir imagen-->
                         <div class="form-group row">
                            
                            <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                            <div class="col-md-6">
                                
                                 <!--cargar imagen avatar amb asirven, 2 mas elegante-->
                            @include('includes.avatar')
                                
                                
                                <input id="image_path" type="file" class="form-control @error('image_path') is-invalid @enderror" name="image_path" />

                                @error('imagen_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                          <!--final subir imagen-->
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            
</div>






@endsection

