@extends('parent')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   <a href="{{route('crud.index')}}"> <button class="btn-default" >back</button></a>
    <form action="{{route('crud.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="firstname">firstname:</label>
            <input type="text" class="form-control" placeholder="Enter firstname" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">lastname:</label>
            <input type="text" class="form-control" placeholder="Enter lastname" name="lastname">
        </div>
        <div class="form-group">
            <label for="image">image:</label>
            <input type="file" class="form-control"  name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
