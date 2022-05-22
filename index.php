<?php
$result = '[
    {
        "name": "Nguyen van cuong",
        "age": "21 tuổi"
    },
    {
        "name": "Nguyen van kinh",
        "age": "22 tuổi"
    },
    {
        "name": "Nguyễn Van huy",
        "age": "23 tuổi"
    }
]';
$json = json_decode($result);
var_dump($json);

foreach ($json as &$value) {
   echo $value->name."\n";
}

