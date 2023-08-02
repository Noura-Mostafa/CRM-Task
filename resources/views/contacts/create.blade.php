@extends('layouts.main')
@section('title' , 'create')

@section('content')

<div class="container pt-5">
    <h1>Add Your Contacts</h1>

    <x-errorbox/>

    <form action="{{ route('users.contacts.store' , $user->id) }}" method="post">
        @csrf

        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="name" placeholder="name">
            <label for="name">Name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="address" class="form-control" id="address" placeholder="Address">
            <label for="address">Address</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
            <label for="phone">Phone</label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" name="age" class="form-control" id="age" placeholder="Age">
            <label for="age">Age</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="work" class="form-control" id="work" placeholder="work">
            <label for="work">Work</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="card-number" class="form-control" id="card-number" placeholder="Card number">
            <label for="card-number">Card number</label>
        </div>

        <button type="submit" class="btn btn-info">Add</button>


    </form>
</div>

@endsection