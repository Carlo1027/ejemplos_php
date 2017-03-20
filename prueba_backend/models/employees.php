<?php 

class EmployeesModel
{
	
	private $object = Array();
	
	public function __construct()
	{
	}

	public function getPreview($object)
	{
		$this->object['id'] = $object['id'];
		$this->object['name'] = $object['name'];
		$this->object['email'] = $object['email'];
		$this->object['position'] = $object['position'];
		$this->object['salary'] = $object['salary'];
		return $this->object;
	}

	public function getDetail($object)
	{
		$this->object['id'] = $object['id'];
		$this->object['name'] = $object['name'];
		$this->object['email'] = $object['email'];
		$this->object['phone'] = $object['phone'];
		$this->object['address'] = $object['address'];
		$this->object['address'] = $object['address'];
		$this->object['position'] = $object['position'];
		$this->object['salary'] = $object['salary'];
		$this->object['skills'] = $object['skills'];
		return $this->object;
	}
}

?>