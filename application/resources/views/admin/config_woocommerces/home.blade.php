@extends('adminlte::page')

@section('title', 'Configuración Woocommerce')

@section('content')
	@include('flash::message')
    <div class="panel panel-default">
    	<div class="panel-heading">
    		<h2>Configuraciones Woocommerce</h2>
    	</div>
    	<div class="panel-body">
    		<a class="btn btn-success" href="{{ route('config_woocommerces.create') }}"><i class="fa fa-plus"></i> New</a>
    		<br />
    		<br />
    		<table class="table table-bordered table-striped data-table">
    			<thead>
    				<th>ID</th>
    				<th>Url</th>
    				<th>Client Key</th>
    				<th>Client Secret</th>
    				<th>Version</th>
    				<th></th>
    			</thead>
    			<tbody>
    				@foreach($cws as $wc)
    					<tr>
    						<td>{{ $wc->id }}</td>
    						<td>{{ $wc->url }}</td>
    						<td>{{ $wc->client_key }}</td>
    						<td>{{ $wc->client_secret }}</td>
    						<td>{{ $wc->version }}</td>
    						<td>
    							<a class="btn btn-info" href="{{ route('config_woocommerces.edit',['id' => $wc->id]) }}"><i class="fa fa-pencil"></i></a>
    							{!! Form::open(['route' => ['config_woocommerces.destroy',$wc->id], 'method' => 'DELETE', 'style' => 'display:inline;']) !!}
    								<button class="btn btn-danger delete-row" type="submit"><i class="fa fa-times"></i></button>
    							{!! Form::close() !!}
    						</td>
    					</tr>
    				@endforeach
    			</tbody>
    		</table>
    	</div>
    </div>
@stop
@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		$("table.data-table").DataTable();
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
		$("button.delete-row").click(function(){
			if(!confirm("Estas seguro de eliminar este Registro?")){
				return false;
			}
		});
	});
</script>
@stop