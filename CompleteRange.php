<?php 
class CompleteRange {

	private $max;
	private $min;
	
	public function build($array)
	{
		$resultado = '';
		try {
			$this->max = max($array);
			$this->min = min($array);
			$new_array = Array();
			
			for ($i=$this->min; $i <= $this->max; $i++) {
				array_push($new_array, $i);
			}
			$resultado = implode(',', $new_array);
			return $resultado;

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}

$var1 = [1, 2, 4, 5];
$var2 = [2, 4, 9];
$var3 = [55, 58, 60];

$clase = new CompleteRange();
echo  'Ejemplos:'.'<br />';
echo 'entrada : ['.implode(',', $var1).'] 	salida : ['.$clase->build($var1).']<br>';
echo 'entrada : ['.implode(',', $var2).']	salida : ['.$clase->build($var2).']<br>';
echo 'entrada : ['.implode(',', $var3).'] 	salida : ['.$clase->build($var3).']<br>';
?>