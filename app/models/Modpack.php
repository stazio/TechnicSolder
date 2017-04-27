<?php

/**
 * Class Modpack
 * @property int id
 * @property string name
 * @property string slug
 * @property string recommended
 * @property string latest
 * @property string url
 * @property string icon_md5
 * @property string logo_md5
 * @property string background_md5
 * @property string created_at
 * @property string updated_at
 * @property int order
 * @property boolean hidden
 * @property boolean private
 * @property boolean icon
 * @property boolean logo
 * @property boolean background
 * @property string icon_url
 * @property string logo_url
 * @property string background_url
 */
class Modpack extends Eloquent {
	public $timestamps = true;

	public function builds()
	{
		return $this->hasMany('Build');
	}

	public function clients()
	{
		return $this->belongsToMany('Client')->withTimestamps();
	}

	public function private_builds()
	{
		$private = false;
		foreach($this->builds as $build){
			if($build->private){
				$private = true;
				break;
			}
		}
		return $private;
	}
}
