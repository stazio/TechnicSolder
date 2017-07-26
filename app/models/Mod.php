<?php

/**
 * Class Mod
 *
 * @property int id
 * @property string name
 * @property string description
 * @property string author
 * @property string link
 * @property string created_at
 * @property string updated_at
 * @property string pretty_name
 * @property string donatelink
 * @property int mod_type
 */

class Mod extends Eloquent {

    const MOD_TYPE_UNIVERSAL = 0, MOD_TYPE_SERVER = 1, MOD_TYPE_CLIENT = 2;

	public $timestamps = true;

	public function versions()
	{
		return $this->hasMany('Modversion');
	}

    public function isUniversalMod() {
        return $this->mod_type == Mod::MOD_TYPE_UNIVERSAL;
    }

    public function isServerMod() {
        return $this->mod_type == Mod::MOD_TYPE_SERVER;
    }

    public function isClientMod() {
        return $this->mod_type == Mod::MOD_TYPE_CLIENT;
    }
	
	
	public static function modNotIn(int $build) {
		return	Mod::all();
	}
}
