<?php
 require_once('model/Nouvelle.class.php');
class RSS {
        private $titre; // Titre du flux
        private $url;   // Chemin URL pour télécharger un nouvel état du flux
        private $date;  // Date du dernier téléchargement du flux
        private $nouvelles; // Liste des nouvelles du flux
        private $enclosure; //image de la nouvelle

        // Contructeur
        function __construct($anurl) {
          $this->url = $anurl;
        }

        // Fonctions getter
        function titre() {
          return $this->titre;
        }
        function url(){
          return $this->url;
        }
        function date(){
          return $this->date;
        }
        function nouvelles(){
          return $this->nouvelles;
        }
        function enclosure(){
          return $this->enclosure;
        }

        // Récupère un flux à partir de son URL
      function update() {
        // Cree un objet pour accueillir le contenu du RSS : un document XML
        $doc = new DOMDocument;
        //Telecharge le fichier XML dans $rss
        $doc->load($this->url);

        // Recupère la liste (DOMNodeList) de tous les elements de l'arbre 'title'
        $nodeList = $doc->getElementsByTagName('title');
        // Met à jour le titre dans l'objet
        $this->titre = $nodeList->item(0)->textContent;
        // Recupère la liste de toutes les dates
        $nodeList = $doc->getElementsByTagName('pubDate');
        //Met à jour la date dans l'objet
        $this->date = $nodeList->item(0)->textContent;
        //recupère la liste des url
        $nodeList = $doc->getElementsByTagName('link');
        //met à jour la date dans l'objet
        $this->url = $nodeList->item(0)->textContent;
        //met à jour l'image de l'objet
        $nodeList = $doc->getElementsByTagName('enclosure');
        $this->enclosure = $nodeList->item(0)->textContent;

      $nomLocalImage=1;
      // Recupère tous les items du flux RSS
      foreach ($doc->getElementsByTagName('item') as $node) {

        $nouvelle = new Nouvelle();
        // Met à jour la nouvelle avec l'information téléchargée
        $nouvelle->update($node);
        // Télécharge l'image
        $nouvelle->downloadImage($node,$nomLocalImage);
        // on ajoute la nouvelle courante a la liste
        $this->nouvelles[] = $nouvelle;

      }
      }
    }

?>
