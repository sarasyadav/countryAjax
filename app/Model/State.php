<?php
class State extends Model {
	public $belongsTo = array(
			'Country'
	);
	public $hasMany = array(
			'City'
	);
}
