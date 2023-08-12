@extends('layouts.main')
@section('title' , 'CRManagment')

@section('content')

<div class="container pt-5">

    <div class="header text-center">
        <h1>Welcome Back To CRManagment.</h1>
        <h3 class="text-info mt-2">Your Contacts</h3>
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{route('contacts.create')}}" class="btn btn-info">+ Add Contacts</a>

        <form action="{{ URL::current() }}" method="get" class="d-flex">
            <input type="text" placeholder="Search" name="search" class="form-control me-1">
            <button class="btn btn-dark" type="submit">Search</button>
        </form>

    </div>


    <table class="table mt-4 border">
        <thead>
            <tr>
                <th scope="col">Contact Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{$contact->name}}</td>
                <td>{{$contact->phone}}</td>
                <td>{{$contact->email}}</td>
                <td class="w-25">
                    <div class="actions d-flex">
                        <a class="btn btn-dark btn-sm rounded-pill me-1" href="{{route('contacts.edit' ,$contact->id)}}">Edit</a>
                        <a class="btn btn-info btn-sm rounded-pill me-1" href="{{route('contacts.show' ,$contact->id)}}">Show</a>
                        <form action="{{route('contacts.destroy' , $contact->id)}}" method="post">
                            @csrf
                            {{method_field("DELETE")}}
                            <button class="btn btn-danger rounded-pill btn-sm" type="submit">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    {{$contacts->links()}}




</div>

@endsection