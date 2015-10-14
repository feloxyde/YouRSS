<?php
      // Test de la classe RSS
      require_once('model/RSS.class.php');

      //Test de la class Nouvelle
    //  require_once('model/Nouvelle.class.php');

<<<<<<< HEAD

      // Une instance de RSS
      $rss = new RSS('http://www.lemonde.fr/m-actu/rss_full.xml');

      // Charge le flux depuis le réseau
      $rss->update();
/*
      // Affiche le titre
      echo $rss->titre()."\n";
=======
      // Charge le flux depuis le réseau
      $rss->update();

      // Affiche le titre
      echo $rss->titre()."\n";// Test de la classe RSS
>>>>>>> f605dbf86f4cca4b4e17f43151f1e05f926ad5e2

      echo $rss->date()."\n";

      echo $rss->url()."\n";
*/

      // Affiche le titre et la description de toutes les nouvelles
      foreach($rss->nouvelles() as $nouvelle) {
        echo ' '.$nouvelle->titre().' '.$nouvelle->date()."\n";
        echo '  '.$nouvelle->description()."\n";
        echo '  '.$nouvelle->url()."\n";
        echo '  '.$nouvelle->description()."\n";
        echo '  '.$nouvelle->copyright()."\n";
      }

?>
