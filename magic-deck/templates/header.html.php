<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic Deck Builder</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="/node_modules/materialize-css/dist/css/materialize.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/app.css"/>
</head>
<body>

<nav class="nav-extended grey darken-4">

    <div class="nav-wrapper">
        <a href="/" class="brand-logo">Magic Deck Builder</a>
        <a data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li class="active"><a href="/cards">Cards</a></li>
            <?php if (!$session->get("user")): ?>
                <li class="active"><a href="/user/login" rel="nofollow">Login</a></li>
            <?php else: ?>
                <li class="active"><a href="/deck">Deck</a></li>
                <li class="active"><a href="/user/logout" rel="nofollow">Logout</a></li>
            <?php endif ?>
        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li class="active"><a href="/cards">Cards</a></li>
    <?php if (!$session->get("user")): ?>
        <li class="active"><a href="/user/login" rel="nofollow">Login</a></li>
    <?php else: ?>
        <li class="active"><a href="/deck">Deck</a></li>
        <li class="active"><a href="/user/logout" rel="nofollow">Logout</a></li>
    <?php endif ?>
</ul>
