<?php
require_once(__DIR__. '/app/coffee_index.php');

$coffee = [
    [
        'id'                => 1,
        'name'              => 'ブラジル',
        'features'          => '世界最大の生産量。バランスが良いです。',
        'taste'             => 'ナッツのような香ばしさ、控えめな酸味があります。',
        'recommendation'    =>[
            ['id'    =>  1,'howTodrink'  =>  '中煎りでブラック'],
            ['id'    =>  2,'howTodrink'  =>  'ブレンドのベース'],
        ],
    ],
    [
        'id'                => 2,
        'name'              => 'エチオピア',
        'features'          => 'コーヒー発祥の地。華やかな香りがあります。',
        'taste'             => 'ベリーやジャスミンのようなフルーティーな酸味があります。',
        'recommendation'    =>[
            ['id'    =>  1,'howTodrink'  =>  '浅煎りでハンドドリップ'],
        ],
    ],
    [
        'id'                => 3,
        'name'              => 'グアテマラ',
        'features'          => '火山灰土壌で育つ。豊かなコクがあります。',
        'taste'             => 'チョコレートのような甘みと、上品な酸味があります。',
        'recommendation'    =>[
            ['id'    =>  1,'howTodrink'  =>  '中深煎りでカフェオレ'],
            ['id'    =>  2,'howTodrink'  =>  'ミルクとの相性が抜群'],
        ],
    ],
];

$resultMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $selected = $_POST['selectSweet'];

    foreach ($coffee as $item) {

        $res = App\CoffeeWithSweets::searchPairing($item, $selected);

        if ($res !== "デザートを選んでください。") {
            $resultMessage = $res;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>コーヒーペアリング検索</title>
</head>
<body>

<div class="container">
    <h1>Coffee Pairing</h1>

    <form action="coffee.php" method="post">
        <div class="select-box">
            <label>一緒に楽しむデザートを選んでください：</label>
            <select id="dessert-selector" name="selectSweet">
                <option value="">-- スイーツを選択 --</option>
                <option value="クッキー・焼き菓子">クッキー・焼き菓子</option>
                <option value="フルーツ・タルト">フルーツ・タルト</option>
                <option value="チョコレート・ケーキ">チョコレート・ケーキ</option>
            </select>
        </div>
        <button type="submit">検索</button>
    </form>

    <div id="display-area">
        <p class="no-data">
            <?php
                echo "$resultMessage";
            ?>
        </p>
    </div>
</div>

</body>
</html>