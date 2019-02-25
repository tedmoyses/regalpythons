
@extends('layout')

@section('title', 'index page')

@section('content')

<div id="carouselHero" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="carouselHero" data-slide-to="0" class="active" ></li>
    <li data-target="carouselHero" data-slide-to="1" ></li>
    <li data-target="carouselHero" data-slide-to="2" ></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/assets/images/slide1.jpg" alt="first slide" class="d-block w-100" />
    </div>
     <div class="carousel-item">
      <img src="/assets/images/slide2.jpg" alt="second slide" class="d-block w-100" />
    </div>
      <div class="carousel-item ">
      <img src="/assets/images/slide3.jpg" alt="third slide" class="d-block w-100" />
    </div>
 </div>
</div>

<div class="row">
  <div class="col">
      <h1>Index/home page</h1>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
        culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
</div>
@endsection
