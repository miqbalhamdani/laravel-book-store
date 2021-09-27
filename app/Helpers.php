<?php

/**
 * price with html label
 *
 */
if (!function_exists('rupiahFormat'))
{
    function rupiahFormat($number)
    {
        return 'IDR '. number_format((int)$number,0,',','.');
    }
}
