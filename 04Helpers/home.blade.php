/resources/views/


@extends('layouts.app')

@section('content')


  <div class='description'>                        
                        <span class='nickname'>{{'@'.$image->user->nick}}</span>
                        <span class="nickname date">{{' | '.\FormatTime::LongTimeFilter($image->created_at)}}</span>
                        <p>{{$image->description}}</
                    </div>

                    <!-- botton comentios -->

@endsection

