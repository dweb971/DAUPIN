<?php 
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>REGIONMAXIMINI - Connexion</title>
</head>

<body>

    <div class="container" id="container">
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-8">
                <?php 
            //print_r($_SERVER);
            // si deconnexion ou session expire 
            if($_SERVER["HTTP_REFERER"] == "https://".$_SERVER["HTTP_HOST"]."/dashboard.php")
            {


            }
                
                if(isset($_SESSION["msg"]))
                {
                // affiche message erreur
                ?>
                <div class="alert alert-danger" role="alert">
                    A simple danger alert—check it out!
                </div>

                <?php
                }else{
                // efface toutes les sessions declares
                $_SESSION = array();
                session_destroy();
                }
                
                ?>
                <form action="traitement.php" method="POST" class="needs-validation" novalidate>
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Connectez Vous !</h1>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="Inputemail">Email</label>
                                <input type="email" class="form-control" id="emailFrm" aria-describedby="emailHelp"
                                    name="emailFrm" minlenght="7" maxlenght="5977" required>
                                <div class="valid-feedback">
                                    Adresse email valide!
                                </div>
                                <div class="invalid-feedback">
                                    Indiquer votre adresse email!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Inputpassword">Mot de passe</label>
                                <input type="password" class="form-control" id="password"
                                    aria-describedby="motdepasseHelp" name="password" required minlenght="6"
                                    maxlenght="10" required>
                                <div class="valid-feedback">
                                    Mot de passe valide!
                                </div>
                                <div class="invalid-feedback">
                                    Mot de passe invalide!
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Connexion !</button>
                            <a href="motdepasseoublie.php" title="Mot de passe Oublié">Mot de passe oublié ?</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>