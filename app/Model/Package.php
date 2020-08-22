<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package';

    public function price()
	{
		return $this->hasOne('App\Model\PackagePrice', 'id', 'package_price_id');
	}
}
