<?php
class Nouvelle{
  private $titre; // Titre du flux
  private $date;  // Date du dernier téléchargement du flux
  private $url; //url de la Nouvelle
  private $description; //description de la nouvelle
  private $enclosure; //image de la nouvelle


function titre() {
          return $this->titre;
      }

function date(){
          return $this->date;
      }

function url(){
        return $this->url;
      }

function description(){
        return $this->description;
}
function enclosure(){
        return $this->enclosure;
}
function update(DOMElement $item) {

        $nodeList = $item->getElementsByTagName('title');
        $this->titre    = $nodeList->item(0)->textContent;

        $nodeList = $item->getElementsByTagName('pubDate');
        $this->date  = $nodeList->item(0)->textContent;

        $nodeList = $item->getElementsByTagName('link');
        $this->url = $nodeList->item(0)->textContent;

        $nodeList = $item->getElementsByTagName('description');
        $this->description = $nodeList->item(0)->textContent;

        $nodeList = $item->getElementsByTagName('enclosure');
        $this->enclosure = $nodeList->item(0)->textContent;
      }

function downloadImage(DOMElement $item, $imageId){
  // On suppose que $node est un objet sur le noeud 'enclosure' d'un flux RSS
      // On tente d'accéder à l'attribut 'url'

      $nodeList = $item->getElementsByTagName('enclosure');
      if($nodeList->length !=0){
        $node = $nodeList->item(0)->attributes->getNamedItem('url');

        if ($node != NULL) {
        // L'attribut url a été trouvé : on récupère sa valeur, c'est l'URL de l'image
        $url = $node->nodeValue;
        // On construit un nom local pour cette image : on suppose que $nomLocalImage contient un identifiant unique
        $this->image = 'model/images/'.$imageId.'.jpg';

        // On télécharge l'image à l'aide de son URL, et on la copie localement
        file_put_contents($this->image, file_get_contents($url));
      }
    }else{
      //aucune image
      $this->image = " ";
    }

}


}

 ?>
