@extends('layouts.app')

@section('content')

    <section id="banner">

        @include('layouts._nav')

        <div class="movies owl-carousel owl-theme">

            @foreach ($latest_movies as $latest_movie)

                <div class="movie text-white d-flex justify-content-center align-items-center">

                    <div class="movie__bg" style="background: linear-gradient(rgba(0,0,0, 0.6), rgba(0,0,0, 0.6)), url({{$latest_movie->image_path}}) center/cover no-repeat;"></div>

                    <div class="container">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="d-flex justify-content-between">
                                    <h1 class="movie__name fw-300">{{ $latest_movie->name }}</h1>
                                    <span class="movie__year align-self-center">{{ $latest_movie->year }}</span>
                                </div>

                                <div class="d-flex movie__rating my-1">
                                    <div class="d-flex">
                                        @for ($i = 0; $i < $latest_movie->rating; $i++)
                                            <span class="fas fa-star text-primary mr-2"></span>
                                        @endfor
                                    </div>
                                    <span class="align-self-center">{{ $latest_movie->rating }}</span>
                                </div>

                                <p class="movie__description my-2">
                                    {{ $latest_movie->description }}
                                </p>

                                <div class="movie__cta my-4">
                                    @auth
                                        <a href="#" class="btn btn-outline-light text-capitalize movie__fav-btn">
                                            <span class="far fa-heart movie__fav-icon movie- fw-900 "
                                                  data-movie-id="#"
                                                  data-url="#"
                                            >
                                            </span>
                                            add to favorite
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-outline-light text-capitalize"><span class="far fa-heart"></span> add to favorite</a>
                                    @endauth
                                </div>
                            </div><!-- end of col -->

                            <div class="col-6 mt-2 mx-auto col-md-4 col-lg-3  ml-md-auto mr-md-0">
                                <img src="{{ $latest_movie->poster_path }}" class="img-fluid" alt="">
                            </div>
                        </div><!-- end of row -->

                    </div><!-- end of container -->

                </div><!-- end of movie -->

            @endforeach

        </div><!-- end of movies -->

    </section><!-- end of banner section-->


    @include('layouts._footer')

@endsection