<?php
class ChangeString {
    
    function build($array){
        
        $abcdario=array("a","b","c","d","e","f","g","h","i",
        				"j","k","l","m","n","ñ","o","p","q",
        				"r","s","t","u","v","w","x","y","z",
                        "A","B","C","D","E","F","G","H","I",
                        "J","K","L","M","N","Ñ","O","P","Q",
                        "R","S","T","U","V","W","X","Y","Z");

        $cambios=array("b","c","d","e","f","g","h","i","j",
        			   "k","l","m","n","ñ","o","p","q","r",
        			   "s","t","u","v","w","x","y","z","a",
                       "B","C","D","E","F","G","H","I","J",
                       "K","L","M","N","Ñ","O","P","Q","R",
                       "S","T","U","V","W","X","Y","Z","A");
        
        $resultado='';
        
        for($i=0;$i<strlen($array);$i++) {
            
            $pos=array_search($array[$i], $abcdario);
            
            if(is_numeric($pos)){
	            
	            $resultado=$resultado.$cambios[$pos];
            
            }elseif(!$pos){
            	
            	$resultado=$resultado.$array[$i];
            
            }
        }
        return $resultado;
    }
}

$var1 = "123 abcd*3";
$var2 = "**Casa 52";
$var3 = "**Casa 52Z";

$clase = new ChangeString();
echo  'Ejemplos:'.'<br />';
echo  'entrada : "'.$var1.'"	salida : "'.$clase->build($var1).'"<br>';
echo  'entrada : "'.$var2.'"   	salida : "'.$clase->build($var2).'"<br>';
echo  'entrada : "'.$var3.'"   	salida : "'.$clase->build($var3).'"<br>';
?>