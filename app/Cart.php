<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
		'user_id',
		'tovar_id',
	];

	public function tovar()
	{
		return $this->hasOne(Tovar::class, 'id', 'tovar_id');
	}

}
