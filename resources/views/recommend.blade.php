@extends('layouts.app')

<style>
    .position {
        position: relative;
        left: 18rem;
        width: 50rem;
    }

    .main {
        min-height: calc(110vh - 211px - 58px);
    }

    .loader {
        width: 50%;
        height: 30%;
        padding-left: 40%;
        margin: 0 auto;
        z-index: 99999;
    }

</style>

@section('content')
    <div>
        <div class="container my-5 main">
            <div class="mt-5"></div>
            <div class="row my-5">
                <h1 class="text-center text-light display-3">Movies you may like:</h1>
            </div>
            <div class="row loader">
                <img class="imgg" src="{{ asset('/assets/circles.svg') }}" alt="Error loading">
            </div>

            <div class="row recommended-movies text-light text-center">

            </div>
        </div>
    @endsection

    @section('footer')
        @include('layouts.footer')
    @endsection

    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        @if ($preferences->isNotEmpty())
            <script>
                $(document).ready(function() {
                    @foreach ($preferences as $preference)
                        fetchMovies('{{ $preference->title }}')
                    @endforeach
                });

                function fetchMovies(movie) {
                    let data = {
                        "title": movie
                    }
                    $.ajax({
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json"
                        },
                        type: 'POST',
                        url: "http://127.0.0.1:8000/recommend/",
                        data: JSON.stringify(data),
                        success: function(response) {
                            let html = ''
                            $.each(response.movies, function(index, movie) {
                                html += `<div class="col-md-2 d-flex flex-column ">
                                    <img src="${response.posters[index]}" alt="">
                                    <p class="pt-2">${movie}</p>
                                </div>`
                            })
                            $('.recommended-movies').append(html)
                        }
                    });
                }
                $(function() {
                    setTimeout(() => {
                        $(".loader").fadeOut(3000);
                    },00)
                })
            </script>
        @endif
    @endsection
