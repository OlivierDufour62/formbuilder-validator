<?php
require_once('vendor/formbuilder/formbluilder.php');
require_once('vendor/validator/validator.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="libs/css/main.css">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div>
            <?php
            $x = new Formbuilder('POST', '', 'form-control');
            echo $x->startFieldset('border', 'coucou', '')
                ->startDiv()
                ->label('coucou', 'mail')
                ->input('coucou', 'text', '1', 'form')
                ->endDiv()
                ->label('pass', 'password')
                ->input('password', 'password', '1', 'form')
                ->label('date', 'date')
                ->input('date', 'date', '1', 'form')
                ->button('submit', 'valider', 'btn btn-danger')
                ->input('url', 'URL','','','entrez Votre URL','', 'mail invalide')
                ->input('file', 'file','','','','', 'invalid file')
                ->getform();

                if(isset($_POST['coucou'])){
                    $y = new Validator;
                    $y->testEmail($_POST["coucou"], 'Email invalide')
                    ->testPwd($_POST["password"],'/^[a-Z]/', 'mdp invalide')
                    ->testDate($_POST["date"], 'date érroné', 'format date invalide')
                    ->validTypeMime('file',['application/msword', 'application/pdf'],'votre fichier ne correspond pas')
                    ->isValid();
                }
                
            ?>
        </div>

    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>