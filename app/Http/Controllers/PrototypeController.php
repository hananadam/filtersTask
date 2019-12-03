<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prototype;

class PrototypeController extends Controller
{
    public function getFilterResults(Request $request)
    {
    	$filteredData=[];
    	$data = Prototype::getData();

    	if(isset($request['provider']))
    	{
    		$filteredData = Prototype::filterByProvider($data,$request['provider']);
    	}
    	else
    	{
    		$filteredData = Prototype::filterByProvider($data);
    	}

    	if(isset($request['statusCode']) || isset($request['status']))
    	{
    		$filteredData = Prototype::filterByStatusCode($filteredData,$request['statusCode'],$request['status']);
    	}

    	if(isset($request['currency']))
    	{
    		$filteredData = Prototype::filterByCurrency($filteredData,$request['currency']);
    	}

    	if(isset($request['balanceMin']) && isset($request['balanceMax']) )
    	{
    		$filteredData = Prototype::filterByBalance($filteredData,$request['balanceMin'],$request['balanceMax']);
    	}

    	if(empty($filteredData)){
    		$result['status'] = 200;
    		$result['message'] = 'failed';
			$result['data'] = "No Data Found";
			return $result;
    	}

    	$result['status'] = 200;
		$result['message'] = 'success';
		$result['data'] = $filteredData;
		return $result;
    }
}
