<?php

$comment = htmlspecialchars($_POST['text']);
$text_nonspace = str_replace(array(" "), '', $comment); //сама строка
$buc = htmlspecialchars($_POST['buc']); //буква
$z = substr_count($comment, '!'); //разделеннная строка
$zam = htmlspecialchars($_POST['zam']); //строка замены
$zamen = htmlspecialchars($_POST['zamen']); //на что заменить
if (!preg_match('/\p{Cyrillic}/u', $comment)) { //проверка на русские символы

    echo $comment . "<br />";
    echo "Количество символов c пробелами - " . strlen($comment) . "<br />";
    echo '<br/>', 'Количество символов без пробелов: ', mb_strlen($text_nonspace, 'utf-8');
    echo '<br/>', "Обратная строка - " . strrev($comment) . "<br />";
    echo '<br/>', 'Вы выбрали букву: ', $buc;
    echo '<br/>', "Количество избранных символов - " . substr_count($comment, $buc) . "<br />";

    $str = explode("!", $comment);
    for ($x = 0; $x < $z + 1; $x++) echo '<br/>', $str[$x];
    $zamenen = str_replace($zam, $zamen, $comment); //замена строк
    echo '<br/>', 'Строка после замены: ', $zamenen;
    $sum = strlen($comment) + strlen($buc) + strlen($zam) + strlen($zamen); //сумма сиволов
    echo '<br/>', 'Всего символов введено: ', $sum;
} else {
    echo '<br/>', 'Нельзя русские буквы';
}
