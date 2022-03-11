<?php

use Carbon\Carbon;

function presentPrice($price)
{
    return '$' . number_format(($this->price) / 100);
    
}