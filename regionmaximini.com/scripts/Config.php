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
        $reqS = "SELECT * FROM connexion WHERE email = '".$log."' ";
        $dbh = $this->get_DBConnect()->query($reqS);


        if($dbh->rowCount() === 1)
        {
            //trouve un resultat // verification password
            foreach( $dbh as $row)
            {
                if( password_verify($this->get_pass(),$row["password"]))
                {
                    // redirection dashboard et declaration sessions
                    $_SESSION["email"] = $log;
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

    public function newP(string $email)
    {

        $this->set_login($this->nettoyer(strtolower($email)));
        $log = $this->get_login();


        # find me on table connexion
        $reqS = "SELECT * FROM connexion WHERE email = '".$log."' ";
        $dbh = $this->get_DBConnect()->query($reqS);


        if($dbh->rowCount() === 1){

            # test for change password 
        $passwordT = "azertyui";
        $passwordT = password_hash($passwordT, PASSWORD_DEFAULT);


            foreach($dbh as $info){

                $emailTable = $info["email"];
                
            # update on table connexion
            $reqU = "UPDATE connexion  SET password = '".$passwordT."' WHERE email = '".$emailTable."'";
            $dbh = $this->get_DBConnect()->query($reqU);

            //print_r($dbh);

            /* Ceci produira une erreur. Notez la sortie ci-dessus,
                * qui se trouve avant l'appel à la fonction header() */
                header('Location: https://'.$_SERVER["HTTP_HOST"].'/index.php');
                exit;

            }

        } else {
            # not found


        }


        $this->set_email($this->nettoyer(strtolower($email)));
        echo  $log = $this->get_email();
        $reqS = "SELECT * FROM user WHERE email = '".$log."'";
        $req = $this->get_DBConnect()->prepare($reqS);
    
        $req->execute();
    
        #stock result
        $result = $req->fetch(PDO::FETCH_ASSOC);
        
    
        #verif password
        if($req->rowCount()===1){
            //print_r($result);
    
            # envoi mail
            $id = $result["id"];
            
            $o = "Votre nouveau mot de passe.";
            $m = "Bonjour, <a href='https://regionmaximini.com'>cliquez-ici</a>pour recevoir votre nouveau mot de passe ";
            $this->send_email($result["email"],$o,$m);
    
        
        }else{
            echo "pas de resultat ou erreur requete ";
        }
    


    }
    
    public function send_email($email,$o,$m)
    {
        # envoi mail 
    
        $to = $email;
        $objet = $o;
        $message = $m;
        $to.$objet.$message;
    
        mail($to,$objet,$message);
    
        /*if()
        {
    
        }else{
    
        }
        */
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