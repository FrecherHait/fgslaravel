@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Фильмы</th>
                            <th>Жанры</th>
                        </tr>
                        </thead>
                        @foreach($paginator as $item)
                            @php /** @var \App\Models\MoviePage $item */ @endphp
                            <tr>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <a href="{{ route('movie.pages.show', $item->slug)}}">{{ $item->title}}</a>
                                </td>
                                <td>
                                    {{ $item->category->title }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        @if($paginator->total() > $paginator->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="cart-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
