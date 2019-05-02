@extends('adminlte::page')

@section('title', 'Detalle de Pedido #'.$order->number)

@section('content_header')
    <h1>Detalle de Pedido #{{ $order->number }}</h1>
@stop

@section('content')
    <div class="panel panel-default">
    	<div class="panel-heading">
    		<h2>Articulo</h2>
    	</div>
    	<div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Foto</th>
                    <th>SKU</th>
                    <th>Description</th>
                    <th>Coste</th>
                    <th>Catidad</th>
                    <th>Total</th>
                </thead>
                <tr>
                    <td>
                        <img src="{{ $product->image }}" class="img-thumbnail" style="width: 100px !important; height: 100px !important;">
                    </td>
                    <td>
                        {{ $product->sku }}
                    </td>
                    <td>
                        {{ $product->description }}
                    </td>
                    <td>
                        {{ $product->price }}
                    </td>
                    <td>
                        {{ $product->qty }}
                    </td>
                    <td>
                        {{ $product->total }}
                    </td>
                </tr>
            </table>
    	</div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Informaci&oacute;n del Pedido</h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <h3>General</h3>
                    <hr />
                    <div class="form-group">
                        <label>Fecha de Creaci&oacute;n</label>
                        <input type="text" class="form-control" value="{{ date('d-m-Y - H:m:s',strtotime($order->date_created)) }}" readonly="readonly">
                    </div>

                    <div class="form-group">
                        <label>Estado</label>
                        <input type="text" class="form-control" value="{{ $order->status }}" readonly="readonly">
                    </div>

                    <div class="form-group">
                        <label>Cliente</label>
                        <input type="text" class="form-control" value="{{ $order->billing->first_name }} {{ $order->billing->last_name }}" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" value="{{ $order->billing->email }}" readonly="readonly">
                    </div>
                </div>

                <div class="col-md-4">
                    <h3>Facturaci&oacute;n</h3>
                    <hr />
                    
                </div>

                <div class="col-md-4">
                    <h3>Envio</h3>
                    <hr />
                    
                </div>
            </div>
        </div>
    </div>
@stop