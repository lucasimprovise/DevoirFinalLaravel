@extends('master')

@section('contenu')
    @foreach($users as $user)
        {{$user->email}} <br>
        {{$user->name}} <br><br>

@endforeach