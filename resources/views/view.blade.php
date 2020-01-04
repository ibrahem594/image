@extends('parent')
@section('content')
    <a href="{{route('crud.index')}}"> <button class="btn-default" >back</button></a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="jumbtron text-center">
    <img src="{{\Illuminate\Support\Facades\URL::to('/')}}/uploads/{{$data->image}}" class="img-thumbnail" width="200px" height="200px"/>
    <h3>first name:{{$data->firstname}}</h3>
    <h3>first name:{{$data->lastname}}</h3>
    </div>

    @endsection
