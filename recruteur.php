
<?php
require 'connexion/database.php';
$mailto = "etienblog@gmail.com";
if(isset($_POST['formrecruteur']))
{

    $name = checkInput($_POST['nom']);
    $telephone = checkInput($_POST['telephone']);
    $quartier = checkInput($_POST['quartier']);
    $entreprise = checkInput($_POST['entreprise']);
    $personnel = checkInput($_POST['personnel']);
    $personnel2 = checkInput($_POST['personnel2']);
    $salaire = checkInput($_POST['salaire']);
    $message = checkInput($_POST['message']);
    $mailtext = "";
    $erreur = false;
    
    /*if(!empty($_POST['nom']) AND !empty($_POST['prenoms']) AND !empty($_POST['contact']) AND !empty($_POST['quartier']) AND !empty($_POST['taches']) AND !empty($_POST['salaire']) AND !empty($_POST['conditions']) AND !empty($_POST['tranche_age']) AND !empty($_POST['oui']) AND !empty($_POST['message']))
	  {*/
          /*if(!empty($name)) {

            if(!empty($quartier)) {*/
                

                $db = Database::connect();
                $statement = $db->prepare("INSERT INTO employeur (name, telephone, quartier, entreprise, personnel, personnel2, salaire, message) values(?, ?, ?, ?, ?, ?, ?, ?)");

                $statement->execute(array($name, $telephone, $quartier, $entreprise, $personnel, $personnel2, $salaire, $message));

                $statement1 = $db->query('SELECT * FROM employeur ORDER BY id DESC LIMIT 0, 1');
                 $categories = $statement1->fetch();
                Database:: disconnect(); 

                $mailtext .= "NOM :". $categories['name']."<br>";
                $mailtext .= "Prenom:". $categories['telephone']."<br>";
                $mailtext .= "contact:". $categories['quartier']."<br>";

                $headers = "From:". $categories['name']. "<> <br> Reply-To:  ";
                mail($mailto, "un message de votre site", $mailtext, $headers);
                
                $erreur = true;
                $erreur1 = "vos informations ont été enregistrer avec succes $mailtext &nbsp; &nbsp; &nbsp <a href=\"connexion.php\"> Page d'acceuil</a> ";

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







<!DOCTYPE html>
<html lang="en">
  <head>
    <title>AGENCE SOPHIA | Personnel de maison, recrutement et placement - Abidjan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Agence Sophia basée à Abidjan, recrute et place du personnel de maison hautement qualifié : majordome, gouvernant(e) de maison, gouvernant(e) d’enfant, nanny, employé(e) de maison, femme ou homme de ménage, intendant, cuisinier, cuisiniere, chauffeur… Nous plaçons notre personnel chez les particuliers, dans les entreprises. Nous faisons également l'entretien et le nettoyage de locaux pour entreprises et particuliers">
    <meta name="keywords" content="agence placement, agence sophia, nounou, servante, ménagère, cuisinier, cuisinière, babysitter, gouvernante, majordome, femme de menage, fille de ménage, chauffeur, cours à domicile, abidjan, recrutement de personnel, personnel de maison">
    
    <script src ="https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>

    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body style="background-image: url('images/bg.jpg');">
  
  <div class="site-wrap">

    
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    <div class="site-navbar-wrap js-site-navbar bg-white">
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="row align-items-center">
            <div class="col-2">
              <h2 class="mb-0 site-logo"><a href="index.html" class="font-weight-bold"><img src="logo-sophia.jpg" alt="Logo Agence Sophia placement de personnel de maison a Abidjan" width="150" height="65"></a></h2>
            </div>
            <div class="col-10">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container">
                  <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                  <ul class="site-menu js-clone-nav d-none d-lg-block">
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="apropos.html">A propos</a></li>
					<li><a href="services.html">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="recruteur.php"><span class="d-inline-block p-3 bg-primary text-white btn btn-primary">Recrutez ici</span></a></li>             
                    <li><a href="candidat.php"><span class="d-inline-block p-3 bg-primary text-white btn btn-primary">Postulez ici</span></a></li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="site-blocks-cover inner-page overlay" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center" data-aos="fade">
          <h1 class="text-uppercase"> Postez votre offre </h1>
          <span class="caption d-block text-white">Tel: +22507482494</span>
            <div class="col-md-12" style="font-size:20px; text-align: center;">
                <?php
                if(isset($erreur))
                {
                    echo '<font color="red";>'.$erreur."</font>";
                }

                ?>
            </div>
        </div>
      </div>
    </div>  

    <div class="py-5 bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
            
          
            <form action="recruteur.php" method="post" class="p-5 bg-white">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="nom">Nom</label>
                  <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="telephone">Téléphone</label>
                  <input type="telephone" id="telephone" name="telephone" class="form-control" placeholder="Téléphone">
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="quartier">Quartier</label>
                  <input type="text" name="quartier" id="quartier" class="form-control" placeholder="Quartier">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="entreprise">Entreprise</label>
                  <input type="text" name="entreprise" id="entreprise" class="form-control" placeholder="Entreprise">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="personnel">Personnel Recherché</label>
                  <select name="personnel" class="form-control"  >
                      <option value="" selected="">Faites votre sélection</option>
                      <option value="servante" >Servantes ou serveurs</option>
                      <option value="nounou">Nounous ou baby-sitters</option>
                      <option value="entretien">Entretien de bureau</option>
                      <option value="chauffeur">Chauffeurs</option>
                      <option value="ouvrier">Ouvriers spécialisés</option>
                      <option value="cuisinier">Cuisiniers ou cuisinières</option>
                      <option value="menage">Femmes de ménage</option>
                      <option value="gouvernante">Gouvernante de maison</option>
                      <option value="technicien">Techniciens de surface</option>
                      <option value="blanchisseur">Blanchisseurs</option>
                      <option value="repetiteur">Répétiteurs pour cours à domicile</option>
                  </select>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="personnel2">si vous avez autre choix précisez </label>
                  <input type="text" name="personnel2" id="personnel2" class="form-control" placeholder="Personnel">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="salaire">Salaire proposé</label>
                  <input type="text" name="salaire" id="salaire" class="form-control" placeholder="salaire">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Commmentaire éventuel</label> 
                  <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="votre commentaire"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Envoyer Message" name="formrecruteur" class="btn btn-primary text-white px-4 py-2">
                </div>
              </div>

  
            </form>
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Contact Info</h3>
              <p class="mb-0 font-weight-bold">Localisation</p>
              <p class="mb-4">Koumassi-Remblais, près de la Pharmacie du Canal, Abidjan, RCI</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+225 21366339 / +225 07482494</a></p>
			  
              <p class="mb-0 font-weight-bold">Adress E-mail</p>
              <p class="mb-0"><a href="#">contact(at)agencesophia.com</a></p>

            </div>
            
            
          </div>
        </div>
      </div>
    </div>

    <footer class="site-footer">
      <div class="container">
     
        <div class="row">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4 text-white">A propos</h3>
            <p>AGENCE SOPHIA est un cabinet de recrutement, formation et placement de personnel de maison. Nous intervenons egalement dans l’entretien et le nettoyage de locaux (bureaux, domiciles, etc), la blanchisserie et le repassage &agrave; domicile.</p>
            <p><a href="#" class="btn btn-primary rounded text-white px-4">Lire la suite</a></p>
          </div>
          <div class="col-md-5 ml-auto">
            <div class="row">
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Acc&egrave;s rapide</h3>
                  <ul class="list-unstyled">
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="apropos.html">A propos</a></li>
                    <li><a href="services.html">Nos services</a></li>
                    <li><a href="contact.php">Nous joindre</a></li>
                    <li><a href="recruteur.php">Espace recruteur</a></li>
                    <li><a href="candidat.php">Espace travailleur</a></li>
                  </ul>
              </div>
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Nos services</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">Personnel de maison</a></li>
                    <li><a href="#">Entretien et nettoyage</a></li>
                    <li><a href="#">Blanchisserie</a></li>
                    <li><a href="#">Cours &agrave; domicile</a></li>
					<li><a href="#">Formation et assistance</a></li>
					<li><a href="#">Vente de mat&eacute;riels</a></li>
                  </ul>
              </div>
            </div>
          </div>

          
          <div class="col-md-2">
            <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Nos R&eacute;seaux</h3></div>
              <div class="col-md-12">
                <p>
                  <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                  <a href="#" class="p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="p-2"><span class="icon-instagram"></span></a>
                  <a href="#" class="p-2"><span class="icon-vimeo"></span></a>

                </p>
              </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; <script>document.write(new Date().getFullYear());</script> Agence Sophia - T&eacute;l: 07482494 - 21366339 | Made by <a href="https://webconceptci.com" target="_blank">Webconcept CI</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>


  <script> 
var result = <?php echo $erreur; ?>;

if(result){
  swal({
title: "Félicitation!",
text: "Vos informations ont été enregistré avec succès",
icon: "success",
button: "Fermer",
});

$('.swal-button').on('click',function (){
  window.location.href="index.html";
});
 
}

</script>

  </body>
</html>