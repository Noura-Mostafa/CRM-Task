@extends('layouts.main')
@section('title' , 'Contacts')

@section('content')

<div class="container pt-5">
    <h2>{{$contact->name}} Details :</h2>
        <div class="border p-2 me-2 mt-3">
            <h6>Full Name : {{$contact->name}}</h6>
            <h6>Email : {{$contact->email}}</h6>
            <h6>Phone : {{$contact->phone}}</h6>
            <h6>Date of Birth : {{$contact->date_of_birth}}</h6>
            <h6>Job : {{$contact->work}}</h6>

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