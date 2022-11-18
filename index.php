<?php
// header('HTTP/1.0 404 Not Found');
// exit;
$filename1 = 'sites1.txt';
$filename2 = 'sites2.txt';

/**
 * @param $filename
 * @return array|false|string
 */function readSites($filename)
{
    $sites = file_get_contents($filename);
    $sites = explode("\n", $sites);
    array_shift($sites);

    $sites = array_map('trim', $sites);
    $sites = array_filter($sites, function (string $site) {
        if (!strlen($site)) {
            return false;
        }
        if ('#' == substr($site, 0, 1)) {
            return false;
        }
        return true;
    });
    sort($sites);
    return $sites;
}

$sites1 = readSites($filename1);
$sites2 = readSites($filename2);

?><!DOCTYPE html>
<html lang="ru">
<head>
    <title>kuba.moscow &mdash; создание простых сложных сайтов</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/kuba.moscow.css">
    <?php require_once 'metrika.html' ?>
    <link rel="icon" href="favicon.png">
</head>
<body>

<main class="container">
    <h2 class="display-4" style="background: yellow">kuba.moscow</h2>
    <h3>
        Создание простых сложных сайтов любой направленности,
        автоматизирование бизнес-процессов вашей конторы
        в&nbsp;виде веб-сервисов,
        совсем лаконичный дизайн, моментальный отклик,
        а&nbsp;ещё удаление вирусов.
        <br>
    </h3>
    <br>
    <div class="text-center h0">
        <small>Сегодня дежурный менеджер &mdash;</small>
        <br>
        <?php
        $managers = [
            'max@kuba.moscow',
            'max@kuba.moscow',
            'max@kuba.moscow',
            'max@kuba.moscow',
        ];
        sort($managers);

        $day = (int)date('d');

        if (!($day % 4)) {
            $manager = $managers[3];
        } elseif (!($day % 3)) {
            $manager = $managers[2];
        } elseif (!($day % 2)) {
            $manager = $managers[1];
        } else {
            $manager = $managers[0];
        }

        ?>
        <a class="" href="mailto:<?= $manager ?>"><?= $manager ?></a>
    </div>

    <hr size="1">

    <noindex>
        <div class="row" id="sites">
            <div class="col-lg-5">
                <h5 style="background: #">мы додумали, сделали, <br>вывели в свет:</h5>
                <div class="row">
                    <?php foreach ($sites1 as $site): ?>
                        <div class="col-lg-5 col-sm-6">
                            <a href="http://<?= $site ?>" rel="nofollow" target="_blank"
                               class="site-link"><?= $site ?></a><br>
                        </div>
                    <?php endforeach ?>
                </div>
                <br>
                <em>и наверняка много чего-то ещё &mdash; всё не припомнишь.</em>
            </div>
            <div class="col-lg-7">
                <h5>отремонтировали, <br>покрасили, довели до ума:</h5>
                <div class="row">
                    <?php foreach ($sites2 as $site): ?>
                        <div class="col-lg-4 col-sm-6">
                            <a href="http://<?= $site ?>" rel="nofollow" target="_blank"
                               class="site-link"><?= $site ?></a><br>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </noindex>
    <hr size="1">
    <div style="background: #333; margin: 1em; padding: 2em;">
        <h1 style="color: #fff;">Сколько денег?</h1>
        <div style="color: #fff;">Каждый раз по-разному. Иногда сайт-визитка стоит дороже мега-портала. Надо смотреть, в
            общем.
        </div>
    </div>
    <br>
</main>
<script>
    // TODO footer вниз $(window).on('')
</script>
</body>
</html>
