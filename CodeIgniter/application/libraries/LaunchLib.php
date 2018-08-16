<?php
/**
 * Created by PhpStorm.
 * User: tarun
 * Date: 12/8/18
 * Time: 11:12 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class LaunchLib
{

    public function testHitAvailability() {


        $paramStr = $_SERVER['QUERY_STRING'];
//        $paramArray = explode('&',$_SERVER['QUERY_STRING']);
//        foreach ($paramArray as $key=>$value) {
//            $currentParam = explode()
//            if($key=='xfind') {
//                continue;
//            }
//            $paramStr.=$key.'='.urlencode($value).'&';
//        }

        $apiKey = '1m6lfng9fqd5fkv57r1c0cms70';
        $sharedSecret = '60mdjb6pisd5u';
        $timeStamp = time();
        $signature = hash('sha512',$apiKey.$sharedSecret.$timeStamp);
        $authorizationHeader = "EAN apikey=$apiKey,signature=$signature,timestamp=$timeStamp";


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ean.com/2/properties/availability?$paramStr",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "accept: application/json",
                "authorization: $authorizationHeader",
                "customer-ip: 10.15.140.19",
                "User-Agent: ".$_SERVER['HTTP_USER_AGENT']
            ),
        ));


        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $err = curl_error($curl);
        $responseArr = json_decode($response, true);

        curl_close($curl);

        if($httpcode == 200) {
            $result['status'] = 'OK';
        } else {
            $result['status'] = 'ERROR';
        }
        $result['http_code'] = $httpcode;
        $result['result'] = $responseArr;

        return $result;
    }


    public function testHitPropertyDetails() {

//        $paramStr = '';
//        foreach ($_GET as $key=>$value) {
//            if($key=='xfind') {
//                continue;
//            }
//            $paramStr.=$key.'='.urlencode($value).'&';
//        }
        $paramStr = $_SERVER['QUERY_STRING'];

        $apiKey = '1m6lfng9fqd5fkv57r1c0cms70';
        $sharedSecret = '60mdjb6pisd5u';
        $timeStamp = time();
        $signature = hash('sha512',$apiKey.$sharedSecret.$timeStamp);
        $authorizationHeader = "EAN apikey=$apiKey,signature=$signature,timestamp=$timeStamp";


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ean.com/2/properties/content?$paramStr",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "accept: application/json",
                "authorization: $authorizationHeader",
                "customer-ip: 10.15.140.19",
                "User-Agent: ".$_SERVER['HTTP_USER_AGENT']
            ),
        ));


        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $err = curl_error($curl);
        $responseArr = json_decode($response, true);

        curl_close($curl);

        if($httpcode == 200) {
            $result['status'] = 'OK';
        } else {
            $result['status'] = 'ERROR';
        }
        $result['http_code'] = $httpcode;
        $result['result'] = $responseArr;

        return $result;
    }

}