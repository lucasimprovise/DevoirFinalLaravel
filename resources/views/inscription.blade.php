@extends('master')

@section('content')

<form action="/inscription" method="post">

    {{csrf_field()}} 

    <input type="string" name="name" placeholder="Name">

    @if($errors->has('name'))
    <p>{{$errors->first('name')}}</p>
    @endif

    <input type="email" name="email" placeholder="Email" value= {{old('email') }}>

    @if($errors->has('email'))
    <p>{{$errors->first('email') }}</p>
    @endif

    <input type="password" name="password" placeholder="Password">

    @if($errors->has('password'))
    <p>{{$errors->first('password') }}</p>
    @endif

    <input type="password" name="password_confirmation" placeholder="Confirmation password">

    <input type="submit" value="Valider">

</form>

@endsection('content')