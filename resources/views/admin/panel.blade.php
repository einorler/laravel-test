@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="admin_header"> Administratoriaus paletė! </h1>
        </div>

    </div>

    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4">
                <img class="img-circle" src="{{asset('/img/images.jpeg')}}" alt="Generic placeholder image" width="140" height="140">
                <h2>Transportas</h2>
                <p>Čia galite peržiūrėti ir pridėti naujas transporto priemones nurodant jų kuro sunaudojimo kiekius</p>
                <p><a class="btn btn-default" href="{{route('admin_transport')}}" role="button">paržiūrėti &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" src="{{asset('/img/users.jpg')}}" alt="Generic placeholder image" width="140" height="140">
                <h2>Vartotojai</h2>
                <p>Čia galite peržiūrėti visus įmonėje esančius vartotojus</p>
                <p><a class="btn btn-default" href="{{route('admin_users')}}" role="button">paržiūrėti &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" src="{{asset('/img/reports.jpg')}}" alt="Generic placeholder image" width="140" height="140">
                <h2>Ataskaitos</h2>
                <p>Čia galite peržiūrėti vartotojų atliktus važiavimus.</p>
                <p><a class="btn btn-default" href="{{route('admin_reports')}}" role="button">paržiūrėti &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div>
@endsection