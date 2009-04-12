<?php
// Author prajwala
// email  m.prajwala@gmail.com
// Date   12/04/2009
// version 1.0

class HtmlCutString{
  function __construct($string,$limit){
    // create dom element using the html string
    $this->tempDiv = new DomDocument;
    $this->tempDiv->loadXML('<div>'.$string.'</div>');
    // keep the characters count till now
    $this->charCount = 0;
    // character limit need to check
    $this->limit = $limit;
  }
  function cut(){
    // create empty document to store new html
    $this->newDiv = new DomDocument;
    // cut the string by parsing through each element
    $this->searchEnd($this->tempDiv->documentElement,$this->newDiv);
    $newhtml = $this->newDiv->saveHTML();
    return $newhtml;
  }

  function deleteChildren($node) {
    while (isset($node->firstChild)) {
      $this->deleteChildren($node->firstChild);
      $node->removeChild($node->firstChild);
    }
  } 
  function searchEnd($parseDiv, $newParent){
    foreach($parseDiv->childNodes as $ele){
	// not text node
	if($ele->nodeType != 3){
	  $newEle = $this->newDiv->importNode($ele,true);
	  if(count($ele->childNodes) === 0){
	    $newParent->appendChild($newEle);
	    continue;
	  }
	  $this->deleteChildren($newEle);
	  $newParent->appendChild($newEle);
	    $res = $this->searchEnd($ele,$newEle);
	    if($res)
		return $res;
	    else{
		continue;
	    }
	}

	// the limit of the char count reached
	if(strlen($ele->nodeValue) + $this->charCount >= $this->limit){
	  $newEle = $this->newDiv->importNode($ele);
	    $newEle->nodeValue = substr($newEle->nodeValue,0, $this->limit - $this->charCount);
	    $newParent->appendChild($newEle);
	    return true;
	}
	$newEle = $this->newDiv->importNode($ele);
	$newParent->appendChild($newEle);
	$this->charCount += strlen($newEle->nodeValue);
    }
    return false;
  }
}

?>