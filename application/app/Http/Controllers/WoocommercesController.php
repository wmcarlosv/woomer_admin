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
    		$orders[$cont]['id'] =  $wo->id;
    		$orders[$cont]['image'] = $product->images[0]->src;
    		$orders[$cont]['description'] = $wo->line_items[0]->name." ".$wo->line_items[0]->price." X ".$wo->line_items[0]->quantity;
    		$orders[$cont]['client'] = $wo->billing->first_name." ".$wo->billing->last_name;
    		$cont++;
    	}

    	print json_encode($orders);
    }

    public function order($id = NULL, $shop = NULL){

    	$cw = ConfigWoocommerce::findorfail($shop);

    	$woocommerce = new Client(
		    $cw->url,
		    $cw->client_key,
		    $cw->client_secret,
		    [
		        'wp_api' => true,
		        'version' => $cw->version
		    ]
		);

		$order = $woocommerce->get('orders/'.$id);
		$p_id = $order->line_items[0]->product_id;
		$pdt = $woocommerce->get('products/'.$p_id);
		$product = array(
			'image' => $pdt->images[0]->src,
			'description' => $order->line_items[0]->name,
			'price' => $order->line_items[0]->price,
			'qty' => $order->line_items[0]->quantity,
			'total' => $order->line_items[0]->total,
			'permalink' => $pdt->permalink
		);

		return view('admin.orders.woocommerce_order',['order' => $order, 'product' => (object)$product]);
    } 
}
