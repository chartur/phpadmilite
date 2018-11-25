<?php
/**
 * Created by Arthur Chilingaryan.
 * User: arturchilingaryan
 * Date: 11/24/18
 * Time: 12:37 PM
 */

?>

<html>
    <head>
        <link rel="icon" href="/public/image/logo.png" sizes="16x16">

        <link rel="stylesheet" href="/public/css/bootstrap.min.css">
        <link rel="stylesheet" href="/public/css/all.min.css">
        <link rel="stylesheet" href="/public/css/codemirror.css">
        <link rel="stylesheet" href="/public/css/style.css">

        <script src="/public/js/jquery.js"></script>
        <script src="/public/js/bootstrap.min.js"></script>
        <script src="/public/js/codemirror.js"></script>
        <script src="/public/js/sql.js"></script>
    </head>
    <body>
        <div class="container mt-3">
            <div class="row">
                <?php include('render.php') ?>
            </div>
        </div>
    </body>
</html>


<?php
    unset($_SESSION['flash']);
?>