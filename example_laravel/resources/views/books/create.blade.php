<!-- resources/views/books/create.blade.php -->
@extends('books.layout')

@section('content')
    <h1>Add New Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <label for="authorid">Author ID:</label>
        <input type="number" name="authorid" required>
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        <label for="ISBN">ISBN:</label>
        <input type="text" name="ISBN" required>
        <label for="pub_year">Publication Year:</label>
        <input type="number" name="pub_year" required>
        <label for="available">Available:</label>
        <input type="checkbox" name="available" value="1">
        <button type="submit">Create</button>
    </form>
@endsection
