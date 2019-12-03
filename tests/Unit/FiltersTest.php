<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Prototype;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;



class FiltersTest extends TestCase
{
    
    public function testApiConnection()
    {
        $response = $this->get('/api/getFilteredData');
        $response->assertStatus(200);
    }

    public function testApiFilteringParameters()
    {
        // this function tests the filter keys to make sure they are working correctly
        // on any changes to the data array (input) please make sure to change the paramter array as well
        $data = [
                    // 'provider'=>'dataProviderX',
                   'currency'=>'EUR'
                    // 'statusCode'=>'decline',
                    // 'balanceMin'=>'10',
                    // 'balanceMax'=>'300'
                       
                    ];
        $paramter = array('currency'=>'EUR');
        $response = $this->json('GET', '/api/getFilteredData',$data);
        $response->assertJsonFragment($paramter);
    }

    public function testJsonStucture() 
    {

        // this  function tests the structural integretery of provider x json file
        // as long as you tune the paramters you can test the structure however u want
        $data = [
                    'provider'=>'dataProviderX',
                ];
                 
        $response = $this->json('GET', '/api/getFilteredData',$data);
        $response->assertJsonStructure(
           array('data' => 
            ['*'=>
                [
                    'Currency',
                    'parentAmount',
                ]
            ]
            )
        );        
    }
 

}
