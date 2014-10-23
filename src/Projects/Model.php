<?php namespace AnnieDigital\Projects;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Model extends Eloquent {

	use SoftDeletingTrait;

	protected $table = 'projects';

	protected $fillable = ['name', 'description', 'sort'];

	public function tags()
	{
		return $this->belongsToMany('AnnieDigital\Tags\Model', 'project_tag', 'project_id', 'tag_id')->withTimestamps();
	}

}
