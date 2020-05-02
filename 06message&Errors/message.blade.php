resoorces/views/

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.message');


 </div>

<input id="image_path" type="file" name="image_path" class="form-control" class="form-control @error('image_path') is-invalid @enderror" required/>

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                       
                                            <li>{{ $error }}</li>
                                            
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

</div>
</div>
@endsection
