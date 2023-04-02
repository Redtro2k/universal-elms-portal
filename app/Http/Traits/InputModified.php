<?php
namespace App\Http\Traits;
use Carbon\Carbon;

trait InputModified
{
    function dateModified($get_date){
        $date_format = Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $get_date, 'UTC');
        return $fomatted_date = $date_format->format('Y-m-d H:i:s');
    }
}