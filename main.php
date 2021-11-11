<?php

function  revertCharacters($str)
{
    function mb_ucfirst($str)
{
    $str = mb_ereg_replace('^[\ ]+', '', $str);
    $str = mb_strtoupper(mb_substr($str, 0, 1)).
           mb_substr($str, 1, mb_strlen($str));
    return $str;
}
    function revers_word ($word) { 
        $is_upper = false;
        preg_match_all('/./us', $word, $array);
     
        if(mb_strtoupper($array[0][0]) == $array[0][0])
        $is_upper = true;
    
    $revers = mb_strtolower(join('', array_reverse($array[0])));      
    $first_char = mb_substr($revers, 0, 1);
    $array_symb = ['!',',','.',':',';','?','-'];
    
    if(in_array($first_char, $array_symb)){       
        $revers = mb_substr($revers, 1, mb_strlen($revers)-1) . $first_char;     
    }

    if($is_upper) 
    $revers = mb_ucfirst($revers);
    
    return $revers;    
    }   
    
    $array = array_map('revers_word', preg_split('/\s/', $str));    
    return join(' ', $array);

}

$result =  revertCharacters ("Привет! Давно не виделись.");

echo $result;



?>
