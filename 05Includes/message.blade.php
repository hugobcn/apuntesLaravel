/resources/views/include


<!-- <div class="card pub_image">  -->
<div class="card  pub_image">
    <div class="card-header ">
      
    </div>

    <div class="card-body">
        <div class='image-container'>
            <img src ='{{route('image.file',['filename'=> $image->image_path])}}'/>
        </div>




        <div class='description'>                        
            <span class='nickname'>{{'@'.$image->user->nick}}</span>
            <span class="nickname date">{{' | '.\FormatTime::LongTimeFilter($image->created_at)}}</span>
            <p>{{$image->description}}</
        </div>

        <!-- botton comentios -->

        <div class='likes'>
            <!--{{var_dump($image->likes)}}-->

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
            <span class="number_likes">{{count($image->likes)}}</span> 
        </div>

        </div>
