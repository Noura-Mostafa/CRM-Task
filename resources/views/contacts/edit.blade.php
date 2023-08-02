@extends('layouts.main')
@section('title' , 'edit')

@section('content')

<div class="container pt-5">
    <h1>Add Your Contacts</h1>

    <x-errorbox />

    <form action="{{ route('contacts.update' ,$contact->id) }}" method="post">
        @csrf
        @method('put')

        <div class="form-floating mb-3">
            <input type="text" name="name" value="{{old('name' , $contact->name)}}" class="form-control" id="name" placeholder="name">
            <label for="name">Name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
            <label for="email">Email</label>
        </div>

        <div class="form-floating mb-3">
            <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" placeholder="date_of_birth">
            <label for="date_of_birth">Date of Birth</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="address" value="{{old('address' , $contact->address)}}"  class="form-control" id="address" placeholder="Address">
            <label for="address">Address</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="phone" value="{{old('phone' , $contact->phone)}}" class="form-control" id="phone" placeholder="Phone">
            <label for="phone">Phone</label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" name="age" value="{{old('age' , $contact->age)}}"  class="form-control" id="age" placeholder="Age">
            <label for="age">Age</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="work" value="{{old('work' , $contact->work)}}" class="form-control" id="work" placeholder="work">
            <label for="work">Work</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="card_number" value="{{old('card_number' , $contact->card_number)}}" class="form-control" id="card_number" placeholder="Card number">
            <label for="card_number">Card number</label>
        </div>

        <button type="submit" class="btn btn-info rounded-pill">Update</button>


    </form>
</div>

@endsection