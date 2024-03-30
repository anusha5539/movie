@extends('layouts.app')

<style>
    .img {
        background-image: linear-gradient(rgba(74, 222, 118, 0.7), rgba(0, 0, 0, 0.8)), url('images/wholebg1.JPG');
        width: 100%;
        height:100%;
        background-size: cover;
        background-repeat: no-repeat;
        backface-visibility: visible;
        background-position: center;

    }

    .main {
        min-height: calc(110vh - 211px - 58px);
    }

    select {
        padding: 10px 20px;
    }

    .button {
        background-color: rgb(241, 103, 53);
    }
</style>


@section('content')
    <div class=" text-white pt-5  main img ">
        @if (session()->has('message'))
            <div class="alert alert-success text-center mb-5">
                {{ Session()->get('message') }}

            </div>
        @endif
        <h1 class="text-center text font-weight-bold pt-5 text-uppercase my-5 display-4">Update Movie Title:</h1>
        <div class="text-center">
            <form action="{{ url('/update_movie', $prefer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <select name="title" id="" class="form control" value="{{ $prefer->title }}">
                    @foreach ($movies_list as $list)
                        <option value="{{ $list->title }}" @if ($list->title === $prefer->title) selected @endif>
                            {{ $list->title }}</option>
                    @endforeach
                </select>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5"></div>
                <input type="submit" value="Update" class="button text-light py-2 px-5 rounded">
            </form>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

@section('scripts')
@endsection


