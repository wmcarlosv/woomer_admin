<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigWoocommerce extends Model
{
    protected $table = 'config_woocommerces';
    protected $fillable = ['url','client_key','client_secret','version'];
}
