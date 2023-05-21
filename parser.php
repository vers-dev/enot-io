<?php
$database = new PDO("mysql:host=localhost;dbname=enot;charset=utf8mb4;", 'root', '');
$html = file_get_contents("https://www.cbr.ru/currency_base/daily/");
preg_match_all("/<tr>
          <td>(.+?)<\/td>
          <td>(.+?)<\/td>
          <td>(.+?)<\/td>
          <td>(.+?)<\/td>
          <td>(.+?)<\/td>
        <\/tr>/", $html, $matches);

unset($matches[0]);
var_dump($matches);

$fields = ['int_code', 'char_code', 'units', 'name', 'currency'];

for ($j = 0; $j < count($matches[1]); $j++){
    $state = $database->prepare("INSERT INTO currencies (int_code, char_code, units, name, currency) VALUES 
                                                                        ('" . $matches[1][$j] . "', '". $matches[2][$j] ."', '". $matches[3][$j] ."', '". $matches[4][$j] ."', '". $matches[5][$j]."')");
    $state->execute();
}
