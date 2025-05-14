<?php use FitStream\Utilities\Utilities;?>
<?php $utilities = new Utilities();?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $nazov = basename($_SERVER['SCRIPT_NAME']);?>
    <?php $utilities->spravaCSS($nazov);?>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <title>FitStream</title>

</head>