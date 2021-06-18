<?php 

require_once "access/db.php";

// on verifie que POST a bien été initialisée aux bons indexs

  if(isset($_POST['username']) && isset($_POST['password'])){

      $usernameEntre = $_POST['username'];
      $passwordEntre = $_POST['password'];
      //on verifie qu'aucune des deux chaines de caractere n'est "" 

      if  ($usernameEntre != "" && $passwordEntre != ""){

      //on interroge la base de données : y a-t-il un username correspondant dans la table users ?
      $pdo = getPdo();
      $maRequete = $pdo->prepare("SELECT * FROM users WHERE username = :usernameEntre");
      $maRequete->execute(["usernameEntre" => $usernameEntre]);      
      $resultat = $maRequete->fetch();

      //si oui, est-ce que le mot de passe est le mme que celui entré
                //si oui  =   isLoggedIn devient true

      if($resultat){
          $userId = $resultat['id'];
          $username = $resultat['username'];
          $password = $resultat['password'];
          
        
        if($passwordEntre == $password){
          $isLoggedIn = true;

          $_SESSION['userId'] = $userId;
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
        } else {
          echo "Mauvais mot de passe";
        }

      } else {
        echo "Username inexistant";
      }


      } else {
        echo "Veuillez entrer un username et un password";
      }

  }




  

        //verifier si le formulaire a été envoyé
  
            //est-ce qu'on a bien rempli le formulaire avant de l'envoyer
         
       
          //  require_once dirname(__FILE__)."/../access/db.php";
        
        
           // require_once dirname(__FILE__)."/../access/salt.php";


           //  if( md5($passwordEntre).md5($salt) == $vraiMotDePasse  ){

        //    echo "mauvais mot de passe";
             

        //     echo "username inexistant dans la DB";
    
          //   echo "Veuillez entrer un username et un password";




?>