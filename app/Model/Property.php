<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Property extends Model
{

	protected $table    = 'properties';
	protected $fillable = [
		'id',
		'admin_id',
		'place_id',
		'name',
		'des',
		'photo',
		'rooms',
		'wc',
		'space',
		'type',


		'badge',
		'video',
		'created_at',
		'updated_at',
	];

	public function place_id()
	{
		return $this->belongsTo(\App\Model\Place::class, 'place_id');
	}
}
