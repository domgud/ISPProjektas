@if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class = "alert alert-danger">
        {{$error}}
    </div>
    @endforeach
@endif

@if(session('success'))
    <div class = "aler alert-success">
        {{session('error')}}
    </div>
@endif
