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

$currencies = $database->query("SELECT * FROM `currencies`")->fetchAll();

if (count($currencies) === 0){
    for ($j = 0; $j < count($matches[1]); $j++){
        $matches[5][$j] = str_replace(',', '.', $matches[5][$j]);
        $state = $database->prepare("INSERT INTO currencies (int_code, char_code, units, name, currency) VALUES 
                                                                        ('" . $matches[1][$j] . "', '". $matches[2][$j] ."', '". $matches[3][$j] ."', '". $matches[4][$j] ."', '". $matches[5][$j]."')");
        $state->execute();
    }
} else{
    for ($j = 0; $j < count($matches[1]); $j++) {
        $state = $database->prepare("UPDATE currencies SET currency=". $matches[5][$j] ." WHERE int_code=" . $matches[1][$j]);
        $state->execute();
    }
}

