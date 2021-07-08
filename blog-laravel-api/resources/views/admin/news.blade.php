@extends('layouts.app')

@section('content')
    <style>
        #news {
            height: 80vh;
            overflow: scroll;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <h1>News ({{$count}})</h1>
            <hr>
            @if(count($news) > 0)
                <div id="news" class="col-md-12">

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Text</th>
                            <th scope="col">Date</th>
                            <th scope="col">Author</th>
                            <th scope="col" class="col-md-2">Category</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($news as $key => $item)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>
                                    <img src="{{ $item->url_img }}" alt="image-{{$item->id}}" class="w-50">
                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->text }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->author }}</td>
                                <td>ID:{{ $item->cetegories_id }}
                                    <hr>
                                    Name category:
                                    @foreach($category as $categoriya)
                                        @if($categoriya->id == $item->cetegories_id)
                                            {{ $categoriya->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $item->status }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>
                <div class="pagination row">
                    {{ $news->links() }}
                </div>
            @else
                <span> (i) - No data. -</span>
            @endif
        </div>
    </div>
@endsection
