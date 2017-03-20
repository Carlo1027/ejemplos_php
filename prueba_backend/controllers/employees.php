<?php 
require 'models/employees.php';

class Employee
{
	private $employees_json;
	function __construct()
	{
		$this->employees_json = file_get_contents("db/employees.json");
	}

	public function getAll()
	{
		$result = json_decode($this->employees_json, true);
		$result_len = count($result);
		$new_result = Array();
		for ($i=0; $i < $result_len; $i++) {
			$object_len = count($result[$i]);
			$object = new EmployeesModel();
			$object = $object->getPreview($result[$i]);
			array_push($new_result, $object);
		}
		return $new_result;
	}

	public function getById($id)
	{
		$result = json_decode($this->employees_json, true);
		$index = array_search($id, array_column($result, 'id'));
	    if (is_bool($index)) {
    		return null;
    	} else {
			$object = new EmployeesModel();
			$object = $object->getDetail($result[$index]);
			return $object;
    	}
	}

	public function getByEmail($email)
	{
		$result = json_decode($this->employees_json, true);
		$index = array_search($email, array_column($result, 'email'));
	    if (is_bool($index)) {
    		return null;
    	} else {
			$object = new EmployeesModel();
			$object = $object->getPreview($result[$index]);
			return $object;
    	}
	}

	public function getBySalary($min, $max)
	{
		$result = json_decode($this->employees_json, true);
		$len = count($result);
		$objects = Array();

		$min = str_replace(',', '', $min);
		$max = str_replace(',', '', $max);

		for ($i=0; $i < $len; $i++) {
			$salary = substr($result[$i]['salary'], 1);
			$salary = str_replace(',', '', $salary);
			if ($salary >= $min && $salary <= $max) {

				array_push($objects, array( 'item' => $result[$i]));
			}
		}
	    return $objects;
	}
}
?>