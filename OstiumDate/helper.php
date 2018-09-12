<?php 

function reverse($word, $separator, $newSeparator = '')
{
    $explode = explode($separator, $word);
    $reverseWord = '';
    $lastIndex = count($explode) - 1;
    for($i = 0; $i < count($explode); $i++)
    {
        if(count($explode) === 1)
        {
            $reverseWord .= $explode[$i];
        }
        else
        {
            $i === 0 ? $j = $lastIndex : $j = $lastIndex - $i;
            $reverseWord .= $explode[$j] . $newSeparator;
        }
    }

    return substr($reverseWord, 0, strlen($reverseWord) - 1);
}