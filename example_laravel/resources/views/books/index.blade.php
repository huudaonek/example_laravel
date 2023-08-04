@extends('books.layout')

@section('content')
    <form action="{{ route('books.search') }}" method="GET">
        <input type="text" name="q" placeholder="Enter search term">
        <button type="submit">Search</button>
    </form>
        <a href="{{ route('books.create') }}" class="btn btn-primary" style="margin-top: 20px;">Add New Book</a>
        <table class="table table-striped">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>BookID</th>
                <th>AuthorID</th>
                <th>Title</th>
                <th>ISBN</th>
                <th>pub_year</th>
                <th>available</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->bookid }}</td>
                    <td>{{ $book->authorid }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->ISBN }}</td>
                    <td>{{ $book->pub_year }}</td>
                    <td>{{ $book->available }}</td>
                    <td>
                        <a href="{{ route('books.edit', ['book' => $book->bookid]) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('books.destroy', ['book' => $book->bookid]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
