<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('searchSubArray'))
{
	function searchSubArray(Array $array, $key, $value) {   
        foreach ($array as $subarray){  
            if (isset($subarray[$key]) && $subarray[$key] == $value)
              return $subarray;       
        } 
    }
}


if ( ! function_exists('count_searchSubArray'))
{
	function count_searchSubArray(Array $array, $key, $values) {  
    	$num = 0; 
        foreach ($array as $subarray){  
            foreach ($values as $value){  
            if (isset($subarray[$key]) && $subarray[$key] == $value)
                 $num++; 
            }
        } 
    	return $num; 
    }
}


if ( ! function_exists('b64'))
{
    function b64($string, $decode = false)
    {        
      return $decode ? base64_decode(strtr($string,'-_,','+/=')) : strtr(base64_encode($string), '+/=', '-_,');
    }
}


if ( ! function_exists('givemethefuckingkml'))
{
    function givemethefuckingkml($regs){
        // Creates the Document.
        $dom = new DOMDocument('1.0', 'UTF-8');

        // Creates the root KML element and appends it to the root document.
        $node = $dom->createElementNS('http://earth.google.com/kml/2.2', 'kml');
        $parNode = $dom->appendChild($node);

        // Creates a KML Document element and append it to the KML element.
        $dnode = $dom->createElement('Document');
        $docNode = $parNode->appendChild($dnode);
            //Create Style
            $restStyleNode = $dom->createElement('Style');
            $restStyleNode->setAttribute('id', 'mystyle');

            $LineStyleNode = $dom->createElement('LineStyle');
            $LColorNode = $dom->createElement('color', '7dff0000');
            $WidthNode = $dom->createElement('width', '2');
            $LineStyleNode->appendChild($LColorNode);
            $LineStyleNode->appendChild($WidthNode);

            $PolyStyleNode = $dom->createElement('PolyStyle');
            $ColorNode = $dom->createElement('color', '7dff0000');
            $PolyStyleNode->appendChild($ColorNode);

            $restStyleNode->appendChild($PolyStyleNode);
            $restStyleNode->appendChild($LineStyleNode);
            $docNode->appendChild($restStyleNode);  



        // Iterates through the MySQL results, creating one Placemark for each row.
        foreach ($regs as $reg)
        {

          // Creates a Placemark and append it to the Document.

          $node = $dom->createElement('Placemark');
          $placeNode = $docNode->appendChild($node);

          // Creates an id attribute and assign it the value of id column.
          //$placeNode->setAttribute('id', 'placemark' . $row['id']);

          // Create name, and description elements and assigns them the values of the name and address columns from the results.
            $descNode = $dom->createElement('description', $reg->DES_DISTRITO);
            $placeNode->appendChild($descNode);

           $styleUrl = $dom->createElement('styleUrl', '#mystyle');
           $placeNode->appendChild($styleUrl);

            // Creates a Point element.
            $multiNode = $dom->createElement('MultiGeometry');
            $polygonNode = $dom->createElement('Polygon');
            $outerNode = $dom->createElement('outerBoundaryIs');
            $linearNode = $dom->createElement('LinearRing');
            $coordNode = $dom->createElement('coordinates',trim($reg->GCOORD));

            $linearNode->appendChild($coordNode);
            $outerNode->appendChild($linearNode);
            $polygonNode->appendChild($outerNode);
            $multiNode->appendChild($polygonNode);
            $placeNode->appendChild($multiNode);   

            // Creates a Point element.
            // $pointNode = $dom->createElement('Point');
            // $placeNode->appendChild($pointNode);
               
            // // Creates a coordinates element and gives it the value of the lng and lat columns from the results.
            // $coorNode = $dom->createElement('coordinates', $reg->CENTRO);
            // $pointNode->appendChild($coorNode);

        }

        $kmlOutput = $dom->saveXML();
        //header('Content-type: application/vnd.google-earth.kml+xml');
        return trim($kmlOutput);
    }
}