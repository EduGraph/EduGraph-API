<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 14.12.2015
 * Time: 19:43
 */

// Composer Autoloader
require_once __DIR__ . '/vendor/autoload.php';

// EduGraph Autoloader
spl_autoload_register(function ($class){
    $parts = explode('\\',$class);
    if(reset($parts) == 'EduGraph') {
        require_once 'lib/Models/' . end($parts) . '.php';
    }
});

use EduGraph\lib\Models\Institution;
use EduGraph\lib\Models\Location;
use EduGraph\lib\Models\Label;

// define Fuseki URIs
define('SPARQL_QUERY_URI', 'http://fbwsvcdev.fh-brandenburg.de:8080/fuseki/biseAPITestData/sparql');

// Prefixes for CURIEs
$prefixes = [];
$prefixes['bise'] = 'http://akwi.de/ns/bise#';
$prefixes['dbpedia'] = 'http://dbpedia.org/resource/';

foreach($prefixes as $key => $value){
    EasyRdf_Namespace::set($key,$value);
}

// Get one institution by CURIE
function getInstitution($curie){
    // match given CURIE
    if(!preg_match("/([a-zA-Z0-9]+):([a-zA-Z0-9]+)/",$curie,$matches)){
        throw new Exception("CURIE not matched.");
    }

    // Convert CURIE to URI
    $namespace = EasyRdf_Namespace::get($matches[1]);
    $uri = $namespace.$matches[2];

    // SPARQL Query
    $results = (new EasyRdf_Sparql_Client(SPARQL_QUERY_URI))->query('
            SELECT ?uri ?url ?prefLabel ?altLabel ?locationUri ?locationLabel ?lat ?lon
            WHERE {
              VALUES ?uri {
                <'.$uri.'>
              }
              ?uri a schema:CollegeOrUniversity .
              ?uri schema:url ?url .
              ?uri skos:prefLabel ?prefLabel .
              ?uri skos:altLabel ?altLabel .
              ?uri schema:location ?locationUri .
              ?locationUri skos:prefLabel ?locationLabel .
              ?locationUri schema:geo ?geo .
              ?geo schema:longitude ?lon .
              ?geo schema:latitude ?lat
            }
        ');

    // iterate through SPARQL Query results
    $resultArray = [];
    foreach($results as $row){
        if(!array_key_exists($row->uri->getUri(), $resultArray)){
            $resultArray[$row->uri->getUri()] = new Institution(
                $row->uri->getUri(),
                $row->url->getValue(),
                [
                    $row->prefLabel->getLang() => new Label($row->prefLabel->getLang(), $row->prefLabel->getValue())
                ],
                [
                    $row->altLabel->getLang() => new Label($row->altLabel->getLang(), $row->altLabel->getValue())
                ],
                new Location(
                    $row->locationUri->getUri(),
                    [
                        $row->locationLabel->getLang() => new Label($row->locationLabel->getLang(), $row->locationLabel->getValue())
                    ],
                    $row->lat->getValue(),
                    $row->lon->getValue()
                )
            );
        }
        else {
            $resultArray[$row->uri->getUri()]->addLabel(new Label($row->prefLabel->getLang(), $row->prefLabel->getValue()));
            $resultArray[$row->uri->getUri()]->addAltLabel(new Label($row->altLabel->getLang(), $row->altLabel->getValue()));
            $resultArray[$row->uri->getUri()]->getLocation()->addLabel(new Label($row->prefLabel->getLang(), $row->prefLabel->getValue()));
        }
    }

    // Return Results
    return reset($resultArray);
}

function getInstitutions(){
    // SPARQL Query
    $results = (new EasyRdf_Sparql_Client(SPARQL_QUERY_URI))->query('
            SELECT ?uri ?url ?prefLabel ?altLabel ?locationUri ?locationLabel ?lat ?lon
            WHERE {
              ?uri a schema:CollegeOrUniversity .
              ?uri schema:url ?url .
              ?uri skos:prefLabel ?prefLabel .
              ?uri skos:altLabel ?altLabel .
              ?uri schema:location ?locationUri .
              ?locationUri skos:prefLabel ?locationLabel .
              ?locationUri schema:geo ?geo .
              ?geo schema:longitude ?lon .
              ?geo schema:latitude ?lat
            }
        ');

    // iterate through SPARQL Query results
    $resultArray = [];
    foreach($results as $row){
        if(!array_key_exists($row->uri->getUri(), $resultArray)){
            $resultArray[$row->uri->getUri()] = new Institution(
                $row->uri->getUri(),
                $row->url->getValue(),
                [
                    new Label($row->prefLabel->getLang(), $row->prefLabel->getValue())
                ],
                [
                    new Label($row->altLabel->getLang(), $row->altLabel->getValue())
                ],
                new Location(
                    $row->locationUri->getUri(),
                    [
                        new Label($row->locationLabel->getLang(), $row->locationLabel->getValue())
                    ],
                    $row->lat->getValue(),
                    $row->lon->getValue()
                )
            );
        }
        else {
            $resultArray[$row->uri->getUri()]->addLabel(new Label($row->prefLabel->getLang(), $row->prefLabel->getValue()));
            $resultArray[$row->uri->getUri()]->addAltLabel(new Label($row->altLabel->getLang(), $row->altLabel->getValue()));
            $resultArray[$row->uri->getUri()]->getLocation()->addLabel(new Label($row->locationLabel->getLang(), $row->locationLabel->getValue()));
        }
    }

    // Return Results
    return $resultArray;
}
