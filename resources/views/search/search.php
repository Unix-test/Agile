<?php
//require_once('../../../vendor/autoload.php');
//
//use \Crew\Unsplash\HttpClient;
//use Crew\Unsplash\Search;
//
//HttpClient::init([
//    'applicationId'	=> 'HzjMOoWV3hBTF7_RI87tgdoVymWFWFFR2vSM3Rwl3dE',
//    'secret'	=> 'sl5q6KPZ8eUAMLWQkN5EayIjiFyZGvtQARCU6OOIySI',
//    'callbackUrl'	=> 'https://127.0.0.1:8001/oauth/authorize/native?code=0qzyjSTHE8DUqzUJr_vdqcSKU9svl6Ppk1_5JXYFYxo',
//    'utmSource' => 'noname'
//]);
//
//if(isset($_GET['search'])){
//
//    $search_string = (string) $_GET['name'];
//    $page = 3;
//    $per_page = 15;
//    $orientation = 'landscape';
//
//    if(empty($search_string)){
//        echo "<pre>"; print_r("404 PAGE"); echo"</pre>";
//    }else{
//        try {
//            $array = Search::photos($search_string, $page, $orientation);
//            echo'<pre>'; print_r($array); echo'</pre>';
//        }catch (ErrorException $e){
//
//        }
//    }
//}
//
//$search = 'forest';
//$page = 3;
//$per_page = 15;
//$orientation = 'landscape';
//
//$array = Search::photos($search, $page, $orientation);
//
//echo'<pre>'; print_r($array); echo'</pre>';
//
//
//
//
//
