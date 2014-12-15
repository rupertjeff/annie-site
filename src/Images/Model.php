<?php namespace AnnieDigital\Images;

use Config;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

/**
 * Class Model
 *
 * @package AnnieDigital\Images
 */
class Model extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * @var string
	 */
	protected $table = 'images';

	/**
	 * @var array
	 */
	protected $fillable = ['file', 'alt', 'caption'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function projects()
	{
		return $this->belongsToMany('AnnieDigital\Projects\Model', 'image_projects', 'image_id', 'project_id')->withTimestamps();
	}

	/**
	 * @return string
	 */
	public function getImageAttribute()
	{
		$file = $this->getAttribute('file');

		return url(Config::get('images.projectImageUrl') . $file);
	}

	/**
	 * @return string
	 */
	public function getThumbAttribute()
	{
		$file = $this->getAttribute('file');

		return url(Config::get('images.projectThumbUrl') . $file);
	}

}
