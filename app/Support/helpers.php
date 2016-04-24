<?php

function paginate($cur, $count, $pp=15)
{
    $out = array();

    if ($count <= $pp)
    {
        return ['1'];
    }

    $num_pages = ceil($count / $pp);

    if ($cur == 1 || $cur == 2)
    {
        for ($i = 1; $i <= $num_pages && $i <= 5; $i++)
        {
            $out[] = strval($i);
        }
    }

    if ($cur > 2)
    {
        $out[] = strval($cur - 2);
        $out[] = strval($cur - 1);
        $out[] = strval($cur);

        for ($i = 4, $num = 1; $i <= $num_pages && $i <= 5; $i++, $num++)
        {
            $out[] = strval($cur + $num);
        }
    }

    return $out;
}
