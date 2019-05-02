@extends('adminlte::page')

@section('title', 'Editar Configuración Woocommerce')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="panel panel-default">
    	<div class="panel-heading">
    		<h2>Editar Configuraci&oacute;n Woocommerce</h2>
    	</div>
    	<div class="panel-body">
    	   {!! Form::open(['route' => ['config_woocommerces.update', $cw->id], 'method' => 'PUT']) !!}
                <div class="form-group">
                    <label for="url">Url: </label>
                    <input class="form-control" type="text" value="{{ $cw->url }}" name="url" id="url" />
                </div>
                <div class="form-group">
                    <label for="client_key">Client Key: </label>
                    <input class="form-control" type="text" value="{{ $cw->client_key }}" name="client_key" id="client_key" />
                </div>
                <div class="form-group">
                    <label for="url">Client Secret: </label>
                    <input class="form-control" type="text" value="{{ $cw->client_secret }}" name="client_secret" id="client_crecret" />
                </div>
                <div class="form-group">
                    <label for="version">Versi&oacute;n: </label>
                    <select class="form-control" name="version" id="version">
                        <option value="wc/v3">V3</option>
                        <option value="wc/v2">V2</option>
                        <option value="wc/v1">V1</option>
                    </select>
                </div>
                <button class="btn btn-success" type="submit"><i class="fa fa-floppy-o"></i> Save</button>
                <a class="btn btn-danger" href="{{ route('config_woocommerces.index') }}"><i class="fa fa-times"></i> Cancel</a>
           {!! Form::close() !!}
    	</div>
    </div>
@stop
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $("#version").val("{{ $cw->version }}");
    });
</script>
@stop