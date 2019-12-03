<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prototype extends Model
{
    public static function getData()
    { 
    	$dataProviderX = json_decode(file_get_contents(__DIR__.'/dataProviderX.json'),true) ;
		$dataProviderY = json_decode(file_get_contents(__DIR__.'/dataProviderY.json'), true) ;

		return array('dataProviderX' => $dataProviderX, 'dataProviderY' => $dataProviderY);
    }

    public static function filterByProvider($filteredData,$filterItem = null )
    {
    	if(empty($filterItem))
    	{
    		$filteredData  = array_merge($filteredData['dataProviderX']['users'], $filteredData['dataProviderY']['users']);
    	}
    	else
    	{
    		$dataProviderX = $filteredData['dataProviderX']['users'];
			$dataProviderY = $filteredData['dataProviderY']['users'];
			$filteredData = $$filterItem;
    	}

		return $filteredData;	
    }
    
    public static function filterByStatusCode($filteredData,$statusCode = null, $status = null )
    {
    	$tempFilteredData=[];

		$statusArray=array('authorised' => array(1,100),'decline'=>array(2,200),'refunded' =>array(3,300)); 

		foreach ($statusArray as $key => $value) {
			if($key != $statusCode && $key != $status)
				$statusArray[$key] = array();
		}
		foreach ($filteredData as $key => $value) {

			if(isset($value['status']))
			{
				if(in_array($value['status'],$statusArray['authorised'])||in_array($value['status'],$statusArray['decline'])||in_array($value['status'],$statusArray['refunded']))
				{
					$tempFilteredData[]=$value;
				}

			}
			elseif(isset($value['statusCode']))
			{
				if(in_array($value['statusCode'],$statusArray['authorised'])||in_array($value['statusCode'],$statusArray['decline'])||in_array($value['statusCode'],$statusArray['refunded']))
				{
					$tempFilteredData[]=$value;
				}
			}
			
		}

		$filteredData = $tempFilteredData;
		return $filteredData;
    }

    public static function filterByBalance($filteredData,$balanceMin,$balanceMax)
    {
    	$tempFilteredData=[];

    	foreach ($filteredData as $key => $value) {
				if(isset($value['balance']) && ( $balanceMin<=$value['balance'] && $balanceMax >= $value['balance']) )
				{
					$tempFilteredData[] = $value;
				}
			}
			$filteredData = $tempFilteredData;
			return $filteredData;
    }

    public static function filterByCurrency($filteredData,$filterItem)
    {
    	$tempFilteredData = [];
		foreach ($filteredData as $key => $value) 
		{
			if(isset($value['currency']) && $value['currency'] == $filterItem)
			{
				$tempFilteredData[] = $value;
			}
			elseif(isset($value['Currency']) && $value['Currency'] == $filterItem)
			{
				$tempFilteredData[] = $value;
			}
		}
		$filteredData = $tempFilteredData;

		return $filteredData;
		
    }

   

}
