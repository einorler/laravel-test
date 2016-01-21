@extends('layouts.app')

@section('content')
<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="first-slide" src="{{asset('img/1.jpg')}}" alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Registruok savo kelionę!</h1>
                        <p>Čia gali registruoti savo atliktą kelionę ir patogiai valdyti ataskaitas</p>
                        <p><a class="btn btn-lg btn-primary" href="{{url('/trip')}}" role="button">Kelionės registras</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="second-slide" src="{{asset('img/2.jpg')}}" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Įmonės informacija</h1>
                        <p>Galite gauti visą reikiamą informaciją apie įmonę</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Informacija</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="third-slide" src="{{asset('img/3.jpg')}}" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Nuorodos </h1>
                        <p>Matyti visas naudingas nuorodas ir daug daugiau</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button"> Nuorodos</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><!-- /.carousel -->

</div>
@endsection
