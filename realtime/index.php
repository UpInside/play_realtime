<?php
require_once __DIR__ . '/config.php';
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meu Site</title>
    <link rel="stylesheet" href="_cdn/app.css">
</head>
<body>

<div class="container">

    <div class="content comments">

        <section class="comments_list">

            <header class="comments_list_header">
                <h1>Comentários</h1>
            </header>

            <div class="comment_list_box">

                <?php

                $read = new \CRUD\Read;
                $read->read('comments', "ORDER BY id DESC LIMIT 2");

                if ($read->getResult()) {
                    foreach ($read->getResult() as $comment) {
                        echo "<article class='comments_list_item' id='" . $comment['id'] . "'>
                                <h2>" . $comment['user'] . "</h2>
                                <p>" . $comment['content'] . "</p>
                                <p class='small'>" . date('d/m/Y H:i', strtotime($comment['created_at'])) . "</p>
                            </article>";
                    }
                }
                ?>

            </div>

        </section>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="_cdn/script.js"></script>
</body>
</html>