<?php 

ini_set('display_errors',1);

// autoloader
spl_autoload_register(function ($name) {
    echo "Tentative de chargement de $name.\n";
    throw new Exception("Impossible de charger $name.");
});
try {
   // instanciation des classes
    include("scripts/Connect.php");
    include("scripts/Config.php");

    $db = new Connect();
    $region = new Config($db);

} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}

/*$region->connexion($_POST);


if( isset($_POST["form"]))
{
    $nomF = $_POST["form"];
}else{
    // connexion a voir 
    $region->login($_POST);
}*/

$nomF = $_POST["form"];

switch ($nomF) {
    case 'newP':
        # nouveau mot de passe
        $region->newP($_POST["emailFrm"]);
        break;
    case 'login' :
        # connexion
        $region->connexion($_POST);
        break;
    
    default:
        # code...
        break;
}