@extends('layouts.main')
@section('title' , 'CRManagment')

@section('content')

<div class="container pt-5">
    <h1>Welcome Back!</h1>
    <h5>To CRManagment</h5>
    <a href="{{route('users.contacts.create' , $user->id)}}" class="btn btn-info rounded-pill">+ Add Contacts</a>
</div>

@endsection