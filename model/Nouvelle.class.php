<?php
class Nouvelle{
  private $titre;
  private $date;




      function titre() {
          return $this->titre;
      }

      function date(){
          return $this->date;
      }


function update(DOMElement $item) {

        $nodeList = $item->getElementsByTagName('title');
        $this->titre    = $nodeList->item(0)->textContent;

        $nodeList = $item->getElementsByTagName('pubDate');
        $this->date  = $nodeList->item(0)->textContent;
//a completer
      }
function update(DOMElement $item) {

        $nodeList = $item->getElementsByTagName('title');
        $this->titre    = $nodeList->item(0)->textContent;

        $nodeList = $item->getElementsByTagName('pubDate');
        $this->date  = $nodeList->item(0)->textContent;
//a completer
      }

}
 ?>
