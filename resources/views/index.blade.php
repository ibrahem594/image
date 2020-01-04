@extends('parent')
@section('content')
    @if($message=\Illuminate\Support\Facades\Session::get('success'))
        <div class="alert-success">
            <p>{{$message}}</p>
        </div>
        @endif
    <a href="{{route('crud.create')}}"> <button class="btn-default" >add</button></a>
    <table class="table table-bordered">
        <tr>
            <th>image </th>
            <th>firstname</th>
            <th>lastname</th>
            <th>action</th>
        </tr>
        @foreach($data as $row)
            <tr>
                <td><img src="{{URL::to('/')}}/images/{{$row->image}}" class="img-thumbnail" width="150px" height="150px"/></td>
                <td>{{$row->firstname}}</td>
                <td>{{$row->lastname}}</td>
                <td><a href="{{route('crud.show',$row->id)}}" class="btn btn-primary">show</a>
                    <a href="{{route('crud.edit',$row->id)}}" class="btn btn-warning">edit</a>
                    <a href="{{route('crud.destroy',$row->id)}}" class="btn btn-danger">delete</a>
                </td>
            </tr>
            @endforeach
    </table>
    {!! $data->links() !!}
    @endsection
