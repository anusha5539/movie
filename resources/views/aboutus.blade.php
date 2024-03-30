@extends('layouts.app')

<style>
    .text1{
        margin-top: 7rem;
        font-weight: bold;

    }
    .text-2{
        text-decoration: underline;
    }

    i{
        font-size: 2rem;
    }
</style>
@section('content')
    <div class="container my-5 text-light">
        <div class="lg:px-60 px-10 row">
            <div class="col-2"></div>
            <img class="col-8  text-center" src="images/aboutus.jpg" alt="error loading">
            <div class="col-2"></div>
            <div>
                <h5 class="my-5 justify">A movie recommendation system is a fancy way to describe a process that tries to
                    predict
                    preferred
                    items based people's similar to you.In order word,Recommendation System is a tool designed to
                    predict/filter
                    the
                    items as per the user’s behavior.Movie recommendation system is provided to user to give entertainment
                    and
                    for
                    leisure time.These contain one of the popularly used recommendation method i.e Content-based filtering
                    They
                    suggest similar items based on a particular item. This system uses item metadata, such as genre,
                    director,
                    description, actors, etc. for movies, to make these recommendations.</h5>
                <h5>Our platform is designed to help movie enthusiasts discover new films tailored to their tastes and
                    preferences.
                    We understand that the sheer volume of movies available can be overwhelming, so we've created a system
                    to
                    simplify the process of finding the perfect movie for any occasion.</h5>

                <div class="my-5  text1">
                    <div class="text-4xl text-center font-weight-bold mt-5">
                        <h1 class="text1 text-2 font-semibold text-uppercase">Features <span class="para">of </span> our <span class="para">Recommendation </span>System
                        </h1>
                    </div>
                    <div class="row sm:my-10 my-5 mx-3 text-center text-2xl">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <i class="fa-solid fa-shuffle"></i>
                            <h2 class="font-semibold">Diverse Selection:</h2>
                            <p>Explore a wide range of genres, from action and adventure to romance and comedy.</p>
                        </div>

                        <div class="col-4">
                            <i class="fa-solid fa-hand-pointer"></i>
                            <h2 class="font-semibold">User Interaction:</h2>
                            <p>Based on your movie preference you can choose whichever movie you like.</p>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row sm:my-10 my-5 mx-3 text-center text-2xl">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <i class="fa-solid fa-infinity"></i>
                            <h2 class="font-semibold">Seamless Interface:</h2>
                            <p>Enjoy a user-friendly interface designed for easy navigation and discovery.</p>
                        </div>
                        <div class="col-4">
                            <i class="fa-solid fa-heart"></i>
                            <h2 class="font-semibold">Personalized Recommend:</h2>
                            <p>Our system provides you movie suggestions as your wish from comedy to horror.</p>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
