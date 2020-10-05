<!DOCTYPE html>
<html lang="en">
<body>
<?php
use  GuzzleHttp\Client;
use \GuzzleHttp\Exception\GuzzleException;

$client = new Client([
    'base_uri' => 'https://api.unsplash.com',
]);

if(isset($_GET['search'])){

    $search_string = (string) $_GET['name'];

    if(empty($search_string)){
       echo "<pre>"; print_r("404 PAGE"); echo"</pre>";
    }else{
        try {
            $rep = $client->request(
                'GET',
                '/search/photos',
                [
                    'query' => [
                        'page' => '1',
                        'query' => $search_string,
                        'client_id'=>'HzjMOoWV3hBTF7_RI87tgdoVymWFWFFR2vSM3Rwl3dE'
                    ]
                ]);

            $body = $rep->getBody();
            $array_body = json_decode($body, true);
            echo "<pre>"; print_r($array_body); echo "</pre>";

        } catch (GuzzleException $e) {

            echo ($e);
        }
    }
}

?>
</body>
</html>


