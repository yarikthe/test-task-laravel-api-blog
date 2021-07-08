@extends('layouts.app')

@section('content')
    <style>
        #category {
            height: 70vh;
            overflow: scroll;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Category</h1>
            <hr>
            @if(count($category) > 0)
                <div id="category" class="col-md-12">

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($category as $key => $item)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>
                                    <img src="{{ $item->url_img }}" alt="image-{{$item->id}}" class="w-50">
                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>
                <div class="pagination row">
                    {{ $category->links() }}
                </div>
            @else
                <span> (i) - No data. -</span>
            @endif
        </div>
    </div>
@endsection
