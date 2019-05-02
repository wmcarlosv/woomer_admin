<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConfigWoocommerce;
use Automattic\WooCommerce\Client;

class WoocommercesController extends Controller
{
    public function orders(){
    	$cws = ConfigWoocommerce::all();
    	return view('admin.orders.woocommerce',['cws' => $cws]);
    }

    public function load_orders($id = NULL){
    	
    	$cw = ConfigWoocommerce::findorfail($id);

    	$woocommerce = new Client(
		    $cw->url,
		    $cw->client_key,
		    $cw->client_secret,
		    [
		        'wp_api' => true,
		        'version' => $cw->version
		    ]
		);

    	$w_orders = $woocommerce->get('orders');
    	$orders = [];
    	$cont = 0;

    	foreach($w_orders as $wo){

    		//get product image
    		$p_id = $wo->line_items[0]->product_id;
    		$product = $woocommerce->get('products/'.$p_id);
    		//end productimage

    		$orders[$cont]['image'] = $product->images[0]->src;
    		$orders[$cont]['description'] = $wo->line_items[0]->name." ".$wo->line_items[0]->price." X ".$wo->line_items[0]->quantity;
    		$orders[$cont]['client'] = $wo->billing->first_name." ".$wo->billing->last_name;
    		$cont++;
    	}

    	print json_encode($orders);
    }
}
