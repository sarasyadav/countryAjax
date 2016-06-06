<?php
class City extends Model {

	public $belongsTo = array(
			'State'
	);
	
}
