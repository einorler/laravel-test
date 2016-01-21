@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="admin_header"> Administratoriaus paletė - vartotojai</h1>
        </div>

    </div>

    <div class="container marketing">

        <div class="row" id="transport-div">
            <h2 class="sub-header">Vartotojai</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Vardas</th>
                        <th>Pavardė</th>
                        <th>e-paštas</th>
                    </tr>
                    </thead>
                    @if(count($users) > 0)
                        @foreach ($users as $user)
                            <tbody>
                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            </tbody>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection