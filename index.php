<?php
                $addr=$_GET["street"];
                $city=$_GET["city"];
                $state=$_GET["state"];
                $degree=$_GET["degree"];
                $api="601851d44f01ef11bfe74a356c93f917";
                
                    $map="https://maps.googleapis.com/maps/api/geocode/xml?address=". rawurlencode($addr). ",". rawurlencode($city). ",". rawurlencode($state)."&key=AIzaSyCHHj0xlmttTEACk9H0klxCIku2I1Aih1M";
                    $resp = file_get_contents($map);
                    $xml_resp = new SimpleXMLElement($resp);
                    if($xml_resp->status[0] == "OK")
                    {
                    $latitude= (string) $xml_resp->result[0]->geometry[0]->location[0]->lat;
                    $longitude=(string) $xml_resp->result[0]->geometry[0]->location[0]->lng;
                    
                    if($_GET["degree"]=="fahrenheit")
                    {
                        $unit="us";
                    }
                    else
                    {
                        $unit="si";
                    }
                   
                    $weather="https://api.forecast.io/forecast/". $api . "/". $latitude ."," .$longitude. "?units=". $unit ."&exclude=flags";
                    $tab = file_get_contents($weather);
                        echo $tab;
                    }
                
        
                        ?>
                    
