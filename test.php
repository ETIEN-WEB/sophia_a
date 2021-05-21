

<?php
require 'database.php';
$mailto = "etienblog@gmail.com";
if(isset($_POST['formcontact']))
{

    $name = checkInput($_POST['nom']);
    $email = checkInput($_POST['email']);
    $telephone = checkInput($_POST['telephone']);
    $message = checkInput($_POST['message']);
    $mailtext = "";
    
    /*if(!empty($_POST['nom']) AND !empty($_POST['prenoms']) AND !empty($_POST['contact']) AND !empty($_POST['quartier']) AND !empty($_POST['taches']) AND !empty($_POST['salaire']) AND !empty($_POST['conditions']) AND !empty($_POST['tranche_age']) AND !empty($_POST['oui']) AND !empty($_POST['message']))
	  {*/
          /*if(!empty($name)) {

            if(!empty($quartier)) {*/
                

                $db = Database::connect();
                $statement = $db->prepare("INSERT INTO contact (name, email,  telephone,message) values(?, ?, ?, ?, ?, ?, ?, ?)");

                $statement->execute(array($name, $email, $telephone, $message));

                $statement1 = $db->query('SELECT * FROM contact ORDER BY id DESC LIMIT 0, 1');
                 $categories = $statement1->fetch();
                Database:: disconnect(); 

                $mailtext .= "NOM :". $categories['name']."<br>";
                $mailtext .= "Prenom:". $categories['email']."<br>";
                $mailtext .= "contact:". $categories['telephone']."<br>";

                $headers = "From:". $categories['name']. "<> <br> Reply-To:  ";
                mail($mailto, "un message de votre site", $mailtext, $headers);
                
        
                $erreur = "vos informations ont été enregistrer avec succes $mailtext &nbsp; &nbsp; &nbsp <a href=\"connexion.php\"> Page d'acceuil</a> ";

                //header("location: index.php");
//vos informations ont été enregistrer avec succes
  //   . "&nbsp; &nbsp; &nbsp <a href=\"connexion.php\"> RETOUR</a> "         
           /* } else {
              $erreur = " le champs  quartier nom doit être remplis !";
            }

              
          } else {
            $erreur = " le champs nom doit être remplis !";
          }*/
    /*  }
      else
	  {
	  	$erreur = " tous les champs doivent être remplis !";
	  }  */
        

}


function checkInput($data)      
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
?>





<?php header("location: index.html"); ?>