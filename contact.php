<?php
/* Page: contact.php */
$VotreAdresseMail="EdwinBernardeau7@gmail.com";
if(isset($_POST['envoyer'])) { // si le bouton "Envoyer" est appuyé
    //on vérifie que le champ mail est correctement rempli
    if(empty($_POST['mail'])) {
        echo "Le champ mail est vide";
    } else {
        //on vérifie que l'adresse mail est correcte
        if(!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.[a-zA-Z]{2,6}$#",$_POST['mail'])){
            echo "L'adresse mail entrée est incorrecte";
        }else{
            //on vérifie que le champ nom et prénom est correctement rempli
            if(empty($_POST['nom'])) {
                echo "Le champ Nom et Prénom est vide";
            }else{
                //on vérifie que le champ message est correctement rempli
                if(empty($_POST['message'])) {
                    echo "Le champ message est vide";
                }else{
                    //tout est correctement renseigné, on envoi le mail
                    //on renseigne les entêtes de la fonction mail de PHP
                    $Entetes = "MIME-Version: 1.0\r\n";
                    $Entetes .= "Content-type: text/html; charset=iso-8859-1\r\n";
                    $Entetes .= "From: Nos instants de douceur <".$_POST['mail'].">\r\n";//de préférence une adresse avec le même domaine de là où, vous utilisez ce code, cela permet un envoie quasi certain jusqu'au destinataire
                    $Entetes .= "Reply-To: Nos instants de douceur <".$_POST['mail'].">\r\n";
                    //on sécurise les champs
                    $Mail=htmlentities($_POST['mail'],ENT_QUOTES,"ISO-8859-1"); //Convertit les guillemets doubles et les guillemets simples
                    $Nom=htmlentities($_POST['nom'],ENT_QUOTES,"ISO-8859-1");
                    $Message=htmlentities($_POST['message'],ENT_QUOTES,"ISO-8859-1");
                    //en fin, on envoi le mail
                    if(mail($VotreAdresseMail,utf8_encode($Nom),nl2br($Message),$Entetes)) { //la fonction nl2br permet de conserver les sauts de ligne et la fonction urf8_encore de conserver les accents dans le titre
                        echo "Le mail à été envoyé avec succès !";
                    } else {
                        echo "Une erreur est survenue, le mail n'a pas été envoyé";
                    }
                }
            }
        }
    }
}
?>

<html><head><title>Nos instants de douceur</title><meta name="description" content="website description"><meta name="keywords" content="website keywords, website keywords"><meta http-equiv="content-type" content="text/html; charset=windows-1252"><link rel="stylesheet" type="text/css" href="style/style.css"></head><body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">Nos instants de <span class="logo_colour">douceur</span></a></h1>
          <h2>Par BOSZNAI Isabelle.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu"><!-- put class="selected" in the li tag for the selected page - to highlight which page you're on --><li><a href="index.html">Accueil</a></li>
          <li><a href="presentation.html">Présentation</a></li>
          <li><a href="ateliersmassagebebe.html">Ateliers massage bébé</a></li>
          <li><a href="ateliersmassageecole.html">Ateliers massage école et/ou en famille</a></li>
		  <li><a href="ateliersminimisp.html">Ateliers mini_Misp</a></li>
		  <li><a href="ateliersportage.html">Ateliers portage</a></li>
          <li class="selected"><a href="contact.html">Contact</a></li>
		  <li><a href="liens.html">Liens</a></li>
        </ul></div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <h1>Coordonnées</h1>
       
        <ul><li>Isabelle BOSZNAI</li>
		<li>10 rue des Bords de l'Eau</li>
		<li>Tél: 06.34.40.45.39</li>
		<li>nosinstantsdedouceur@gmail.com</li></ul>
	
		
        <h1>Liens</h1>
        <ul><li><a href="http://www.massage-bebe.asso.fr/">http://www.massage-bebe.asso.fr/</a></li>
          <li><a href="http://www.misa-france.fr/">http://www.misa-france.fr/</a></li>
          <li><a href="http://www.afpb.fr/">http://www.afpb.fr/</a></li>
        </ul>
      </div>
      <div id="content">
        <h1>Me contacter</h1>
        <form action="#" method="post">
          <div class="form_settings">
            <p><span>Nom et prénom</span><input class="contact" type="text" name="nom_prenom" value=""></p>
            <p><span>E-mail</span><input class="contact" type="text" name="email" value=""></p>
            <p><span>Message</span><textarea class="contact textarea" rows="8" cols="50" name="message"></textarea></p>
            <p style="padding-top: 15px"><span> </span><input class="submit" type="submit" name="Envoie" value="Envoyer"></p>
          </div>
        </form>
		<br><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10018.1952667861!2d-1.4100752091778503!3d47.14475088538087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805e746e674bda5%3A0x21b6e14c23ea1bc8!2s5B+Rue+du+Four+%C3%80+Pain%2C+44690+Saint-Fiacre-sur-Maine!5e0!3m2!1sfr!2sfr!4v1516282038102" width="500" height="350" frameborder="0" style="border:0" allowfullscreen></iframe></br>
      </div>
    </div>
    <div id="footer">
      <p><a href="login.php">Espace Administration</a></p>
    </div>
  </div>
</body></html>
