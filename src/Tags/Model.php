<?php namespace AnnieDigital\Tags;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Model extends Eloquent {

	use SoftDeletingTrait;

	protected $table = 'tags';

}
