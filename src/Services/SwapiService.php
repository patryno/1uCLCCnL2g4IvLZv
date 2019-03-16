<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 16.03.19
 * Time: 13:41
 */

namespace App\Services;


use App\Entity\Person;

class SwapiService
{
    public function takeRecords($numberOfRecord)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://swapi.co/api/people/' . $numberOfRecord . '/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = (array)json_decode(curl_exec($curl));

        return new Person($result);
    }
}
