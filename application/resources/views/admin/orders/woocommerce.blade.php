@extends('adminlte::page')

@section('title', 'Ordenes Woocommerce')

@section('content')
    <div class="panel panel-default">
    	<div class="panel-heading">
    		<h2>Ordenes Woocommerce</h2>
    	</div>
    	<div class="panel-body">
            <div class="form-group">
                <label for="shop-woocommerce">Tienda Woocommerce: </label>
                <select class="form-control" id="shop-woocommerce">
                    @foreach($cws as $cw)
                        <option value="{{ $cw->id }}">{{ $cw->url }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success" type="button" id="load-orders"><i class="fa fa-download"></i> Cargar Ordenes</button>
            <br />
            <br />
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Foto</th>
                    <th>Producto / Precio / Cantidad</th>
                    <th>Cliente</th>
                    <th></th>
                </thead>
                <tbody id="load-woocommerce-orders">
                    <tr>
                        <td colspan="4"><center>Sin Productos</center></td>
                    </tr>
                </tbody>
            </table>
    	</div>
    </div>
@stop
@section('js')
<script type="text/javascript">
    $(document).ready(function(){

        $("#load-orders").click(function(){

            var shop = $("#shop-woocommerce").val();
            var url = 'load_orders/'+shop
            $("#load-woocommerce-orders").html("<tr><td colspan='4'><center>Cargando...</center><td></tr>");

            $.get(url,function( response ){

                var orders = JSON.parse(response);
                var html = "";

                $.each(orders, function(index, obj){

                    html += "<tr>";
                        html+="<td><img class='img-thumbnail' style='width:100px !important; height:100px !important;' src='"+obj.image+"' /></td>";
                        html+="<td>"+obj.description+"</td>";
                        html+="<td>"+obj.client+"</td>";
                        html+="<td><a href='#' class='btn btn-info'>Ver Detalles</a></td>";
                    html+="</tr>";

                });

                $("#load-woocommerce-orders").empty();
                $("#load-woocommerce-orders").append(html);

            });

        });

    });
</script>
@stop