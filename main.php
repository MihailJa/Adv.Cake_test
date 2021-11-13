<?php

function  revertCharacters($str)
{
    function revers_word ($word) {   
        $symbls =  '/[!\-\;,\.#$_\?&~><()]+/';
        $array_word = mb_str_split($word);
        $array_without_symbls = mb_str_split(preg_replace($symbls, "", mb_strtolower($word)));                  
        $revers =  array_reverse($array_without_symbls);    

        $length = count($array_word);
    for($i=0; $i<$length; $i++)
    {
        if(mb_strtoupper($array_word[$i]) === $array_word[$i] && !preg_match( $symbls, $array_word[$i]))
        {            
          $revers[$i] = mb_strtoupper($revers[$i]);            
        }

        if(preg_match( $symbls, $array_word[$i]))
        {           
           array_splice($revers, $i, 0, $array_word[$i]);
        }   
    }    
    return join('', $revers);    
    }   
    
    $result = array_map('revers_word', preg_split('/\s/', $str));    
    return join(' ', $result);
}

$result =  revertCharacters ("При-вет! ДавНо не ви-деЛись.");
echo $result;

?>
