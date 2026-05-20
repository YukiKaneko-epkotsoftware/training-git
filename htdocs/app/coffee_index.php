<?php
namespace App;

class CoffeeWithSweets{

    public static function searchPairing(array $coffee, string $selectSweet): string{
        if($selectSweet === 'クッキー・焼き菓子' && $coffee['name'] === 'ブラジル'){
            $coffee_recommend = array_column($coffee['recommendation'],'howTodrink');
            return $coffee['name'] . "コーヒーがお勧めです。お勧めな淹れ方は、" . $coffee_recommend[0] . "です。" . $selectSweet . "との相性が良いです。";
        }
        if ($selectSweet === 'フルーツ・タルト' && $coffee['name'] === 'エチオピア') {
            $coffee_recommend = array_column($coffee['recommendation'], 'howTodrink');
            return $coffee['name'] . "コーヒーがお勧めです。お勧めな淹れ方は、" . $coffee_recommend[0] . "です。" . $selectSweet . "との相性が良いです。";
        }
        if ($selectSweet === 'チョコレート・ケーキ' && $coffee['name'] === 'グアテマラ'){
            $coffee_recommend = array_column($coffee['recommendation'], 'howTodrink');
            return $coffee['name'] . "コーヒーがお勧めです。お勧めな淹れ方は、" . $coffee_recommend[0] . "です。" . $selectSweet . "との相性が良いです。";
        }
        return "デザートを選んでください。";
    }
}


?>
