<?php
class CountriesController extends AppController {
	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('RequestHandler');
	
	public function getStates() {
		$states = array();
		if (isset($this->request['data']['id'])) {
			$states = $this->Country->State->find('list', array(
				'fields' => array(
					'id',
					'state_name',
				),
				'conditions' => array(
					'State.countries_id' => $this->request['data']['id']
				)
			));
		}
		header('Content-Type: application/json');
		echo json_encode($states);
		exit();
	}
	
	public function index() {
		$Country = $this->Country->find('list', array(
			'fields' => array(
				'id',
				'country_name',
			),
		));
		$this->set('Country', $Country);
	}

	public function getCities() {
		$cities = array();
		if (isset($this->request['data']['id'])) {
			$cities = $this->Country->State->City->find('list', array(
				'fields' => array(
					'id',
					'city_name',
				),
				'conditions' => array(
					'City.state_id' => $this->request['data']['id']
				)
			));
		}
		header('Content-Type: application/json');
		echo json_encode($cities);
		exit();
	}
}