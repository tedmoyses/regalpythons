
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

<div class="container-fluid">
  <div class="row bg-dark text-light text-center">
    <div class="col py-5">
        <p>
          Regal Pythons is a hobbyist Ball Python breeder focussing on combining recessive genes to produce new combinations with bright colours and strong contrasting patterns that retain their brilliance through life
        </p>
        <p>
    Surplus animals from these breedings are made available from time to time on this page
        </p>
        <p>
          If you are interested in a particular morph or combo, drop us a line via the Contacts page or on FB messener
        </p>
      </div>
  </div>
  <div class="row">
    <div class="col-md-7 pl-0">
      <img src="/assets/images/index_orange3.jpg" alt="" class="img-fluid" />
    </div>
    <div class="col-md-5 d-flex">
      <div class="mx-auto justify-content-center align-self-center text-center">
        <h2 class="orange-text">New In!</h2>
        <p>2013 100% Het Lavender Albino Male <br>
          Weight: 400g Sire: 2009-LAV-01<br>
          Morph ID: 2013-HETLAV-01<br>
          Hatch Date: 2013-11-04<br>
          Dam: 2007-HLAV-01<br>
          <span class="orange-text">£300<img src="/assets/images/Arrow-01.svg" class="arrow" /></span>
        </p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5 d-flex">
      <div class="mx-auto justify-content-center align-self-center text-center">
        <h2 class="orange-text">World first pictures</h2>
        <p>Take a look at the huge collection of stunning <br>
          pythons produced here at Regal Pythons<br>
          <span class="orange-text">Gallery<img src="/assets/images/Arrow-01.svg" class="arrow" /></span>
        </p>
      </div>
    </div>
    <div class="col-md-7 pr-0" />
      <img src="/assets/images/index_yellow1.jpg" class="img-fluid" />    
   </div>
  </div>
</div>
@endsection
