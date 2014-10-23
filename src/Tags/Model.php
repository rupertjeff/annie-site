<?php namespace AnnieDigital\Tags;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Model extends Eloquent {

	use SoftDeletingTrait;

	protected $table = 'tags';

	protected $fillable = ['name', 'uri', 'image', 'sort'];

	public function projects()
	{
		return $this->belongsToMany('AnnieDigital\Projects\Model', 'project_tag', 'tag_id', 'project_id')->withTimestamps();
	}

	public function getIconAttribute()
	{
		$img = $this->getAttribute('image');

		return url('img/icons/' . $img);
	}

}
