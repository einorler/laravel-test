@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="admin_header"> Administratoriaus paletė - ataskaitos</h1>
        </div>

    </div>

    <div class="container marketing">
        <div class="row">
            <h2 class="sub-header">Pasirinkit vartotoją ir mėnesį</h2>
            <form class="form-vertical col-md-6" role="form" method="POST" action="{{ route('report-create') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="col-md-4 control-label">Darbuotojo el paštas</label>

                    <div class="col-md-6">
                        <select class="form-control" id="sel1" name="email">
                            @foreach($users as $user)
                                <option>{{ $user->email }} , id: {{ $user->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Metai</label>
                    <div class="col-md-6">
                        <select class="form-control" name="year">
                            @for ($i = 2000; $i < 2017; $i++)
                                <option>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Mėnesis</label>
                    <div class="col-md-6">
                        <select class="form-control" name="month">
                            @for ($i = 1; $i < 13; $i++)
                                <option>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Generuoti ataskaitą
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row" id="transport-div">
            <h2 class="sub-header">Transporto ataskaita</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Vardas</th>
                        <th>Data</th>
                        <th>Maršrutas</th>
                        <th>Išvyko iš terminalo</th>
                        <th>Spidometro parodymai</th>
                        <th>Atvyko pas klientą</th>
                        <th>Išsikrovimas min</th>
                        <th>Išvyko iš kliento</th>
                        <th>Atvyko į terminalą</th>
                        <th>Spidometro parodymai</th>
                        <th>Atstumas</th>
                        <th>Kuras</th>
                    </tr>
                    </thead>
                    @if(!empty($events) && count($events) > 0)
                        @foreach ($events as $event)
                            <tbody>
                            <tr>
                                <td>{{ $event->first_name }}</td>
                                <td>{{ $event->date }}</td>
                                <td>{{ $event->destination }}</td>
                                <td>{{ $event->terminal_leave }}</td>
                                <td>{{ $event->spidometer_start }}</td>
                                <td>{{ $event->client_arrive }}</td>
                                <td>{{ $event->min_spent }}</td>
                                <td>{{ $event->client_leave }}</td>
                                <td>{{ $event->terminal_return }}</td>
                                <td>{{ $event->spidometer_finish }}</td>
                                <td>{{ $calc[$event->id]['distance'] }}</td>
                                <td>{{ $calc[$event->id]['fuel'] }}</td>
                            </tr>
                            </tbody>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection