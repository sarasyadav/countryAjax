<?php
class Country extends Model {

	public $hasMany = array(
			'State'
	);
}
