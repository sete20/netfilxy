@extends('layouts.app.blade')

@section('content')
<section id="show">

@include('layouts._nav')

    <div class="movie">

        <div class="movie__bg" style="background: linear-gradient(rgba(0,0,0, 0.6), rgba(0,0,0, 0.6)), url('dist/images/iron_land.jpg') center/cover no-repeat;"></div>

        <div class="container">

            <div class="row">

                <div class="col-md-8 d-flex justify-content-center align-items-center" style="background: url('dist/images/iron_land.jpg') center/cover no-repeat; height: 70vh;">
                    <span class="movie__play-icon d-flex justify-content-center align-items-center"><i class="fas fa-play text-white fa-2x"></i></span>
                </div><!-- end of col -->

                <div class="col-md-4 text-white">
                    <h3 class="movie__name fw-300">Iron Man</h3>

                    <div class="d-flex movie__rating my-1">
                        <div class="d-flex mr-2">
                            <span class="fas fa-star text-primary mr-2"></span>
                            <span class="fas fa-star text-primary mr-2"></span>
                            <span class="fas fa-star text-primary mr-2"></span>
                            <span class="fas fa-star text-primary mr-2"></span>
                        </div>
                        <span class="align-self-center">4.7</span>
                    </div>

                    <p class="movie__description my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aspernatur at commodi cupiditate explicabo laborum provident qui quod ut. Ad autem blanditiis consequuntur cupiditate distinctio laborum pariatur qui recusandae unde!</p>

                    <a href="" class="btn btn-primary text-capitalize my-3"><i class="far fa-heart"></i> add to favorites</a>

                </div><!-- end of col -->

            </div><!-- end of row -->

        </div><!-- end of container -->

    </div><!-- end of movie -->


</section><!-- end of banner section-->

<section class="listing py-2">

    <div class="container">

        <div class="row my-4">
            <div class="col-12 d-flex justify-content-between">
                <h3 class="listing__title text-white fw-300">Action</h3>
                <a href="" class="align-self-center text-capitalize text-primary">see all</a>
            </div>
        </div><!-- end of row -->

        <div class="movies owl-carousel owl-theme">

            <div class="movie p-0">
                <img src="dist/images/mortal_engines.jpg" class="img-fluid" alt="">

                <div class="movie__details text-white">

                    <div class="d-flex justify-content-between">
                        <p class="mb-0 movie__name">Movie Name</p>
                        <p class="mb-0 movie__year align-self-center">2019</p>
                    </div>

                    <div class="d-flex movie__rating">
                        <div class="mr-2">
                            <i class="fas fa-star text-primary mr-1"></i>
                            <i class="fas fa-star text-primary mr-1"></i>
                            <i class="fas fa-star text-primary mr-1"></i>
                            <i class="fas fa-star text-primary mr-1"></i>
                        </div>
                        <span>4.7</span>
                    </div>

                    <div class="movie___views">
                        <p>Views: 300</p>
                    </div>

                    <div class="d-flex movie__cta">
                        <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                        <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                    </div>

                </div><!-- end of movie details -->

            </div><!-- end of col -->

            <div class="movie p-0">
                <img src="dist/images/gemni.jpg" class="img-fluid" alt="">

                <div class="movie__details text-white">

                    <div class="d-flex justify-content-between">
                        <p class="mb-0 movie__name">Movie Name</p>
                        <p class="mb-0 movie__year align-self-center">2019</p>
                    </div>

                    <div class="d-flex movie__rating">
                        <div class="mr-2">
                            <i class="fas fa-star text-primary mr-1"></i>
                            <i class="fas fa-star text-primary mr-1"></i>
                            <i class="fas fa-star text-primary mr-1"></i>
                            <i class="fas fa-star text-primary mr-1"></i>
                        </div>
                        <span>4.7</span>
                    </div>

                    <div class="movie___views">
                        <p>Views: 300</p>
                    </div>

                    <div class="d-flex movie__cta">
                        <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                        <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                    </div>

                </div><!-- end of movie details -->

            </div><!-- end of col -->

            <div class="movie p-0">
                <img src="dist/images/avatar.jpg" class="img-fluid" alt="">

                <div class="movie__details text-white">

                    <div class="d-flex justify-content-between">
                        <p class="mb-0 movie__name">Movie Name</p>
                        <p class="mb-0 movie__year align-self-center">2019</p>
                    </div>

                    <div class="d-flex movie__rating">
                        <div class="mr-2">
                            <i class="fas fa-star text-primary mr-1"></i>
                            <i class="fas fa-star text-primary mr-1"></i>
                            <i class="fas fa-star text-primary mr-1"></i>
                            <i class="fas fa-star text-primary mr-1"></i>
                        </div>
                        <span>4.7</span>
                    </div>

                    <div class="movie___views">
                        <p>Views: 300</p>
                    </div>

                    <div class="d-flex movie__cta">
                        <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                        <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                    </div>

                </div><!-- end of movie details -->

            </div><!-- end of col -->

            <div class="movie p-0">
                <img src="dist/images/iron.jpg" class="img-fluid" alt="">

                <div class="movie__details text-white">

                    <div class="d-flex justify-content-between">
                        <p class="mb-0 movie__name">Movie Name</p>
                        <p class="mb-0 movie__year align-self-center">2019</p>
                    </div>

                    <div class="d-flex movie__rating">
                        <div class="mr-2">
                            <i class="fas fa-star text-primary mr-1"></i>
                            <i class="fas fa-star text-primary mr-1"></i>
                            <i class="fas fa-star text-primary mr-1"></i>
                            <i class="fas fa-star text-primary mr-1"></i>
                        </div>
                        <span>4.7</span>
                    </div>

                    <div class="movie___views">
                        <p>Views: 300</p>
                    </div>

                    <div class="d-flex movie__cta">
                        <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                        <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                    </div>

                </div><!-- end of movie details -->

            </div><!-- end of col -->

        </div><!-- end of row -->

    </div><!-- end of container -->

</section><!-- end of listing section -->
 @include('layouts._footer')
@endSection