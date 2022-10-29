<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP-продвинутый</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/class.css">
    <?php require 'header.php'; ?>
</head>
<body>
    <div class="container mt-5">
        <?php
        // Подключение файла
        require 'inputFields.php';

        // ВАРИАНТ-1: -----------------------------------------------------------------
        $styleEmail = [
            'width' => '300px',
            'border' => '3px solid green',
            'border-radius' => '10px',
            'background' => '#fcfcfc',
            'padding' => '10px 20px',
            'color' => 'blue',
        ];
        $obj = new InputEmail();
        $obj->addStyles($styleEmail);
        $obj->show();
        $obj->showStyles($styleEmail);

        // ВАРИАНТ 2 -----------------------------------------------------------------
        $styleFile = [
            'width' => 'auto',
            'background' => '#eaecff',
            'padding' => '10px 10px',
            'color' => 'red',
        ];
        $obj = new InputFile();
        $obj->addStyles($styleFile);
        $obj->show();
        $obj->showStyles($styleFile);

        // ВАРИАНТ-3: -----------------------------------------------------------------
        $styleText = [
            'width' => '300px',
            'border' => '3px solid red',
            'background' => '#fcfcfc',
            'padding' => '10px 20px',
            'box-shadow' => '0px 10px 7px -7px rgb(255 0 0 / 80%)',
        ];
        $obj = new InputText();
        $obj->addStyles($styleText);
        $obj->show();
        $obj->showStyles($styleText);

        ?>
    </div>
</body>
</html>
