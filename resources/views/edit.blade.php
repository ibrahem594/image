@extends('parent')
@section('content')

<a href="{{route('crud.index')}}"> <button class="btn-default" >back</button></a>
<form action="{{route('crud.update',$data->id)}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('patch')
    <div class="form-group">
        <label for="firstname">firstname:</label>
        <input type="text" class="form-control"value="{{$data->firstname}}" name="firstname">
    </div>
    <div class="form-group">
        <label for="lastname">lastname:</label>
        <input type="text" class="form-control"  value="{{$data->lastname}}" name="lastname">
    </div>
    <div class="form-group">
        <label for="image">image:</label>
        <input type="file" class="form-control"  name="image">
        <img src="{{\Illuminate\Support\Facades\URL::to('/')}}/upload/{{$data->image}}" class="img-thumbnail"/>
        <INPUT type="hidden" name="hidden_image" value="{{$data->image}}"/>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
