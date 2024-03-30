@extends('layouts.app')

@section('styles')
    <style>
        .home {
            font-size: 10px;
        }

        .image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.8)), url('images/bg.JPG');
            height: 100vh;
            width: 100%;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        .text {
            font-size: 5rem;
            font-weight: bold;

        }

        .text1 {
            font-size: 1.5rem;
            width: 35rem;
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

        /* table{
                                font-size: 5rem;
                            } */
    </style>
@endsection

@section('content')
    <div class="container  main">
        <div class="row justify-content-center text-light ">
            <div class="col-md-12">
                @if ($preferences->count() == 0)
                    <div class="image text-white pt-5">
                        @if (session()->has('message'))
                            <div class="alert alert-success text-center mb-5">
                                {{ Session()->get('message') }}

                            </div>
                        @endif
                        <h1 class="text-center text font-weight-bold pt-5 text-uppercase ">Welcome</h1>
                        <div class="text-center">
                            <form action="{{ url('/preference') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label class="text1 pb-3">Enter three movie's title that you liked</label><br />
                                <select name="title1" id="" class="form control">
                                    @foreach ($movies_list as $list)
                                        <option value="{{ $list->title }}">{{ $list->title }}</option>
                                    @endforeach
                                </select>
                                @error('title1')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                {{-- <div>
                                    <input class="mt-4" required="" type="file" name="image1">
                                </div> --}}
                                <div class="mb-5"></div>
                                <select name="title2" id="" class="form control">
                                    @foreach ($movies_list as $list)
                                        <option value="{{ $list->title }}">{{ $list->title }}</option>
                                    @endforeach
                                </select>
                                @error('title2')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                {{-- <div>
                                    <input class="mt-4" required="" type="file" name="image1">
                                </div> --}}
                                <div class="mb-5"></div>
                                <select name="title3" id="" class="form control">
                                    @foreach ($movies_list as $list)
                                        <option value="{{ $list->title }}">{{ $list->title }}</option>
                                    @endforeach
                                </select>
                                @error('title3')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                {{-- <div>
                                    <input class="mt-4" required="" type="file" name="image1">
                                </div> --}}
                                <div class="mb-5"></div>
                                <input type="submit" value="Submit" class="btn btn-primary py-2 px-5 rounded">
                            </form>
                        </div>
                    </div>
                @else
                @if (session()->has('message'))
                            <div class="alert alert-success text-center mb-5">
                                {{ Session()->get('message') }}

                            </div>
                        @endif
                    <p class="pt-5 text-center display-3">My Movies:</p>
                    <table class="border border-light mt-5 ">
                        <thead>
                            <tr class="border border-light mt-5 button">
                                <th class="border border-light mt-5 px-5 py-2 display-6">Title</th>
                                <th class="border border-light mt-5 px-5 py-2 display-6">Action 1</th>
                                <th class="border border-light mt-5 px-5 py-2 display-6">Action 2</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($preferences as $preference)
                                <tr class="border border-light mt-5">
                                    <td class="border border-light mt-5 px-5 py-2 display-6">
                                        {{ $preference->title }}
                                    </td>
                                    <td class="border border-light mt-5 px-5 py-2 display-6">
                                        <a class="button btn  text-lg px-5 py-2  text-light border rounded"
                                            href="{{ url('/edit_movies',$preference->id) }}">Edit</a><br>
                                    </td>
                                    <td class="border border-light mt-5 px-5 py-2 display-6">
                                        <a class="button btn  text-lg px-5 py-2  text-light border rounded"
                                            href="{{ url('/delete_movies',$preference->id) }}" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</a><br>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row my-5">
            @include('comment')
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

@section('scripts')
@endsection
