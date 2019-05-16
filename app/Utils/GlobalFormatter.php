<?php

namespace App\Utils;

use \Carbon\Carbon;

class GlobalFormatter{
		

	//{{GlobalFormatter::convertTimestamp($bt->start,true,'D, d M Y, H:i')}}
	static public function convertTimestamp($timestamp,$withIcon=true,$format='human')
	{
		if($timestamp == null)
		{
			return 'N/a';
		}

		if($format == 'human')
		{
			if($withIcon)
			{
				echo '<i class="ti-time"></i> '.Carbon::createFromTimeStamp(strtotime($timestamp))->diffForHumans();
			}
			else
			{
				return Carbon::createFromTimeStamp(strtotime($timestamp))->diffForHumans();
			}
		}
		else
		{
			if($withIcon)
			{
				echo '<i class="ti-time"></i> '.Carbon::parse($timestamp)->format($format);
        		
        	}
        	else
        	{
        		return Carbon::parse($timestamp)->format($format);
        	}
		}
		
	}


	static public function moneyFormat($value){
        return number_format($value,2,',','.');
	}

	static public function clearAmount($value)
	{
		$explode = explode(',', $value);
        $clear = str_replace('.', '', $explode[0]);
        return $clear;
	}

}