@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="admin_header"> Kelionių registras</h1>
            <p>Užregistruokit savo šiandienos kelionę</p>
        </div>

    </div>

    <div class="container marketing">
        <div class="row">
            <form class="form-vertical col-md-6" role="form" method="POST" action="{{ url('/trip') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="col-md-4 control-label">Transporto priemonė</label>

                    <div class="col-md-6">
                        <select class="form-control" id="sel1" name="vehicle">
                            @foreach($vehicles as $vehicle)
                                <option>{{ $vehicle->name }} , id: {{ $vehicle->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Išvykimas iš terminalo</label>
                    <div class="col-md-6">
                        <span>Valandos:</span>
                        <select class="form-control" name="hour_left">
                            @for ($i = 0; $i < 24; $i++)
                                <option>{{ $i }}</option>
                            @endfor
                        </select>
                        <span>Minutės:</span>
                        <select class="form-control" name="minutes_left">
                            @for ($i = 0; $i < 60; $i++)
                                <option>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Grįžimas į terminalą</label>
                    <div class="col-md-6">
                        <span>Valandos:</span>
                        <select class="form-control" name="hour_returned">
                            @for ($i = 0; $i < 24; $i++)
                                <option>{{ $i }}</option>
                            @endfor
                        </select>
                        <span>Minutės:</span>
                        <select class="form-control" name="minutes_returned">
                            @for ($i = 0; $i < 60; $i++)
                                <option>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Atvykimas pas klientą</label>
                    <div class="col-md-6">
                        <span>Valandos:</span>
                        <select class="form-control" name="hour_start">
                            @for ($i = 0; $i < 24; $i++)
                                <option>{{ $i }}</option>
                            @endfor
                        </select>
                        <span>Minutės:</span>
                        <select class="form-control" name="minutes_start">
                            @for ($i = 0; $i < 60; $i++)
                                <option>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Išvykimas iš kliento</label>
                    <div class="col-md-6">
                        <span>Valandos:</span>
                        <select class="form-control" name="hour_finish">
                            @for ($i = 0; $i < 24; $i++)
                                <option>{{ $i }}</option>
                            @endfor
                        </select>
                        <span>Minutės:</span>
                        <select class="form-control" name="minutes_finish">
                            @for ($i = 0; $i < 60; $i++)
                                <option>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Iškrovimo laikas</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="min_spent" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Rida išvykstant</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="spidometer_start">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Rida grįžus</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="spidometer_finish">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Vykimo tikslas</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="destination">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Registruoti
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection