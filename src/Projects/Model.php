<?php namespace AnnieDigital\Projects;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

/**
 * Class Model
 *
 * @package AnnieDigital\Projects
 */
class Model extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * @var string
	 */
	protected $table = 'projects';

	/**
	 * @var array
	 */
	protected $fillable = ['name', 'description', 'sort'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function tags()
	{
		return $this->belongsToMany('AnnieDigital\Tags\Model', 'project_tag', 'project_id', 'tag_id')->withTimestamps();
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function images()
	{
		return $this->belongsToMany('AnnieDigital\Images\Model', 'image_project', 'project_id', 'image_id')->withTimestamps();
	}

	public function getImageAttribute()
	{
		$image = $this->images->first();

		if ($image)
		{
			return $image->image;
		}

		return '';
	}

	public function getThumbAttribute()
	{
		$image = $this->images->first();

		if ($image)
		{
			return $image->thumb;
		}

		return '';
	}

}
