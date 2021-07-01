<?php 
/**
 * Config class 
 */

 class Config
 {

    //proprietes -> variables
   
    # proprietes
    
    private $_login;      // email
    private $_pass;
    private $_DBConnect;


    //methodes
    public function __construct($connectOBJ){

    $this->set_DBConnect($connectOBJ->pdo);


    }

    public function connexion(array $data)
    {
        //print_r($data);
        
        $this->set_login($this->nettoyer(strtolower($data["emailFrm"])));
        $log = $this->get_login();
        $this->set_pass($this->nettoyer(strtolower($data["password"])));
        $pass = $this->get_pass();
        
        // requete sql SELECT
        $reqS = "SELECT * FROM connexion WHERE login = '".$log."'";
        $dbh = $this->get_DBConnect()->query($reqS);


        if($dbh->rowCount() === 1)
        {
            //trouve un resultat // verification password
            foreach( $dbh as $row)
            {
                if( password_verify($this->get_pass(),$row["password"]))
                {
                    // redirection dashboard et declaration sessions
                    $_SESSION["email"] = $this->set_login();
                     /* Ceci produira une erreur. Notez la sortie ci-dessus,
                    * qui se trouve avant l'appel à la fonction header() */
                     header('Location: https://'.$_SERVER["HTTP_HOST"].'/dashboard.php');
                     exit;
                }else{
                    // redirection page connexion et session msg error
                    $_SESSION["msg"] = "<p>Erreur sur votre login ou mot de passe !";
                /* Ceci produira une erreur. Notez la sortie ci-dessus,
                * qui se trouve avant l'appel à la fonction header() */
                 header('Location: https://'.$_SERVER["HTTP_HOST"].'/index.php');
                 exit;
                }
            }
        }else{
            //ne trouve pas de resultat

        }
    }


    public function nettoyer($chaine){

        $chaine = trim(strip_tags(htmlentities($chaine)));

        return $chaine;
    }

    //getter / setter

    /**
     * Get the value of _DBConnect
     */ 
    public function get_DBConnect()
    {
        return $this->_DBConnect;
    }

    /**
     * Set the value of _DBConnect
     *
     * @return  self
     */ 
    public function set_DBConnect($_DBConnect)
    {
        $this->_DBConnect = $_DBConnect;

        return $this;
    }

    /**
     * Get the value of _login
     */ 
    public function get_login()
    {
        return $this->_login;
    }

    /**
     * Set the value of _login
     *
     * @return  self
     */ 
    public function set_login($_login)
    {
        $this->_login = $_login;

        return $this;
    }

    /**
     * Get the value of _pass
     */ 
    public function get_pass()
    {
        return $this->_pass;
    }

    /**
     * Set the value of _pass
     *
     * @return  self
     */ 
    public function set_pass($_pass)
    {
        $this->_pass = $_pass;

        return $this;
    }
 }



?>