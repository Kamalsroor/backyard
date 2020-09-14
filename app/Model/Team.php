<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Team extends Model {

protected $table    = 'teams';
protected $fillable = [
		'id',
		'admin_id',
		      'name',
'jop',
'phone',
'email',
'facebook',
'instgram',
'linkedin',
'image',
		'created_at',
		'updated_at',
	];

}
