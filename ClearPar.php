<?php
class ClearPar {

    function build($string)
    {
    	$resultado='';
        preg_match_all('/\(\)/', $string, $matching, PREG_OFFSET_CAPTURE);

        if (count($matching[0]) > 0)
        {
            foreach ($matching[0] as $k => $v)
                $resultado .= substr($string, $v[1], 2);
        }
        
        return $resultado;
    }
}
 
$var1 = "()())()";
$var2 = "()(()";
$var3 = ")(";
$var4 = "((()";

$clase = new ClearPar();
echo  'Ejemplos:'.'<br />';
echo  'entrada : "'.$var1.'"	salida : "'.$clase->build($var1).'"<br>';
echo  'entrada : "'.$var2.'"   	salida : "'.$clase->build($var2).'"<br>';
echo  'entrada : "'.$var3.'"   	salida : "'.$clase->build($var3).'"<br>';
echo  'entrada : "'.$var4.'"   	salida : "'.$clase->build($var4).'"<br>';
?>