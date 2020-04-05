<?php

function formatDate ($date)
{

	return $date;
}


function duration($past, $type = null)
{
    $present = Carbon\Carbon::now();

    if ($past != null)
    {
        switch ($type) 
        {
            case 'years':
                $duration = $past->diffInYears($present);
                break;
            case 'months':
                $duration =   $past->diffInMonths($present);
                break;
            case 'weeks':
                $duration = $past->diffInWeeks($present);
                break;
            case 'days':
                $duration = $past->diffInDays($present);
                break;
            case 'hours':
                $duration = $past->diffInHours($present);
                break;
            case 'minutes':
                $duration = $past->diffInMinutes($present);
                break;
            case 'seconds':
                $duration = $past->diffInSeconds($present);
                break;
            
            default:
                $duration = $past->diffInDays($present);
                break;
        }
    }
    else
    {
        $duration = 0;
    }

    return $duration;

}