@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="admin_header"> Administratoriaus paletė - transportas</h1>
        </div>

    </div>

    <div class="container marketing">

        <div class="row" id="transport-div">
            <h2 class="sub-header">Transporto priemonės</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Valstybinis nr</th>
                        <th>Pavadinimas</th>
                        <th>Suvartojimas stovint (l/h)</th>
                        <th>Suvartojimas išsikraunant (l/h)</th>
                        <th>Suvartojimas važiuojant (l/100km)</th>
                    </tr>
                    </thead>
                    @if(count($vehicles) > 0)
                    @foreach ($vehicles as $vehicle)
                        <tbody>
                        <tr>
                            <td>{{ $vehicle->getPlateNum() }}</td>
                            <td>{{ $vehicle->getName() }}</td>
                            <td>{{ $vehicle->getStatConsumption() }}</td>
                            <td>{{ $vehicle->getLoadConsumption() }}</td>
                            <td>{{ $vehicle->getMovingConsumption() }}</td>
                        </tr>
                        </tbody>
                    @endforeach
                    @endif
                </table>
            </div>
            <button class="btn btn-primary" id="transport-load">Pridėti dar vieną!</button>

            <form class="form-horizontal hidden" id="transport-form" role="form" method="POST" action="{{ route('transport-create') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="col-md-4 control-label" >Valstybinis nr</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nr" id="transportNumProp">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Pavadinimas</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" id="transportNameProp">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Suvartojimas stovint</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="statConsumption" id="transportStatProp">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Suvartojimas išsikraunant</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="loadConsumption" id="transportLoadProp">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Suvartojimas važiuojant</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="movingConsumption" id="transportMovProp">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" id="transportSubmit">Registruoti</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
        </div><!-- /.row -->
    </div>
@endsection