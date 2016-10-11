<?php


function dirTree($dir){

    $d = dir($dir);
    $arDir = array();

    while(false !== ($entry = $d->read())){
        if($entry != '.' && $entry != '..'){
            $arDir[$entry] = $entry;
            if(is_dir($dir.$entry)){
                $arDir[$entry] = dirTree($dir.$entry.'/');
            }
        }
    }
    
    $d->close();
    return $arDir;
    
}

function printTree($array, $level = 0, $parent = null){
    
    echo '<div id="listContainer">';
    foreach($array as $key => $value){
        
        $class='dir';

        if($parent != null){
            if(is_dir($parent.'/'.$key)){
                $class='dir';
            }elseif (is_file($parent.'/'.$key)) {
                $class='file';
            };
        }elseif (is_file($key)){
            $class= 'file';
        }
        
        $output = '<div class="'.$class.'" style="padding-left : ' . ($level *20) .'px;">';

        if($class == 'file'){
            $output .= '<a href="'.$parent.$key.'">'.$key.'</a>';
        }else{
            $output .= $key;
        }
        $output .= '</div>';
        
        echo $output;
        
        if(is_array($value)){
            printTree($value, $level+1, $parent.$key . '/');
        }

        
    }
    echo '</div>';
    
        
}


$directory = './';
$dirTree = dirTree($directory);
?>
<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
            .file{
            	color: orange;
            }
            .dir{
                color: green;
            }
            a{color: orange;}
            
        </style>
	</head>
	<body><?php echo printTree($dirTree); ?></body>
</html>

