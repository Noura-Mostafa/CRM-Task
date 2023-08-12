@extends('layouts.main')
@section('title' , 'Contacts')

@section('content')

<div class="container pt-5">
    <h2>{{$contact->name}} Details :</h2>
        <div class="border p-3 me-2 mt-3">
            <h5>Full Name : {{$contact->name}}</h5>
            <h5>Email : {{$contact->email}}</h5>
            <h5>Phone : {{$contact->phone}}</h5>
            <h5>Date of Birth : {{$contact->date_of_birth}}</h5>
            <h5>Age : {{$contact->age}}</h5>
            <h5>Job : {{$contact->work}}</h5>

            <div class="actions d-flex justify-content-end">
                <a class="btn btn-dark btn-sm rounded-pill me-1" href="{{route('contacts.edit' ,$contact->id)}}">Edit</a>
                <form action="{{route('contacts.destroy' , $contact->id)}}" method="post">
                    @csrf
                    {{method_field("DELETE")}}
                    <button class="btn btn-danger rounded-pill btn-sm" type="submit">Delete</button>
                </form>
            </div>
        </div>
</div>

@endsection