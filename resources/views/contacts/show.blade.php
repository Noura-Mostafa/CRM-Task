@extends('layouts.main')
@section('title' , 'Contacts')

@section('content')

<div class="container pt-5">
    <h1>Your Contacts</h1>

<div class="row">
@foreach ($contact as $contact)
    <div class="col-lg-4 border w-25 p-2 me-2">
    <h2>{{$contact->name}}</h2>
    <h6>{{$contact->work}}</h6>

    <div class="actions d-flex justify-content-between">
    <a class="btn btn-dark btn-sm" href="{{route('users.contacts.edit' ,[$user->id , $contact->id])}}">Edit</a>
    <form action="{{route('users.contacts.destroy' , [$user->id , $contact->id])}}" method="post">
        @csrf
        {{method_field("DELETE")}}
        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
    </form>
    </div>
    </div>

    @endforeach
</div>
    
</div>

@endsection