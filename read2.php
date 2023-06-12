<?php

    include "logic.php";
    require "navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Read PDF</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            background-color: white;

        }

        #pdf-container {
            margin:0;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #f1f1f1;
        }

        embed {
            width: 70%;
        height: 100%;
        margin-left: 500px;
        margin-right: 500px;
        background-color: #ffff;
        border: none;
        }

    </style>
</head>
<body>
    <div id="pdf-container">
        <h1 class="text-align-center mt-0">PDF VIEWER</h1>
        <embed src="<?php echo $file_artikel; ?>" type="application/pdf" />
    </div>
    
</body>
</html>
