<?php
/**
 * EduGraphAPI
 * @version 1.0.0
 */

error_log(E_ALL);

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

require_once __DIR__ . '/vendor/autoload.php';
require_once 'functions.php';

$app = new \Slim\App();

/**
 * GET programsGet
 * Summary: Delivers a list of programs.
 * Notes: Delivers a list of programs.
 * Output-Formats: [application/json]
 */
$app->GET('/programs', function($request, $response, $args) {
            
            
            
            
            $response->write('How about implementing programsGet as a GET method ?');
            return $response;
            });


/**
 * GET programsCurieGet
 * Summary: Delivers one specific program.
 * Notes: Delivers one specific program.
 * Output-Formats: [application/json]
 */
$app->GET('/programs/{curie}', function($request, $response, $args) {
            
            
            
            
            $response->write('How about implementing programsCurieGet as a GET method ?');
            return $response;
            });


/**
 * GET profilesGet
 * Summary: Delivers a list of job profiles.
 * Notes: Delivers a list of job profiles.
 * Output-Formats: [application/json]
 */
$app->GET('/profiles', function($request, $response, $args) {
            
            
            
            
            $response->write('How about implementing profilesGet as a GET method ?');
            return $response;
            });


/**
 * GET profilesCurieGet
 * Summary: Delivers a specific profile.
 * Notes: Delivers a specific profile.
 * Output-Formats: [application/json]
 */
$app->GET('/profiles/{curie}', function($request, $response, $args) {
            
            
            
            
            $response->write('How about implementing profilesCurieGet as a GET method ?');
            return $response;
            });


/**
 * GET getInstitutions
 * Summary: Delivers a list of institutions.
 * Notes: Delivers a list of institutions.
 * Output-Formats: [application/json]
 */
$app->GET('/institutions', function($request, $response, $args) {
            $institutions = getInstitutions();
            $json = json_encode($institutions, JSON_OBJECT_AS_ARRAY);
            $response->write($json);
            return $response->withHeader('Content-type', 'application/json');
            });


/**
 * GET getInstitutionsCurie
 * Summary: Delivers a specific institution.
 * Notes: Delivers a specific institution.
 * Output-Formats: [application/json]
 */
$app->GET('/institutions/{curie}', function($request, $response, $args) {
            $curie = $request->getAttribute('curie');
            $institution = getInstitution($curie);
            $json = json_encode($institution);
            $response->write($json);
            return $response->withHeader('Content-type', 'application/json');
            });


/**
 * GET getNamespaces
 * Summary: List all available prefixes.
 * Notes: List all available prefixes.
 * Output-Formats: [application/json]
 */
$app->GET('/prefixes', function($request, $response, $args) {
            
            
            
            
            $response->write('How about implementing getNamespaces as a GET method ?');
            return $response;
            });


/**
 * GET getNamespacesName
 * Summary: Delivers a specific namespace.
 * Notes: Delivers a specific namespace.
 * Output-Formats: [application/json]
 */
$app->GET('/prefixes/{name}', function($request, $response, $args) {
            
            
            
            
            $response->write('How about implementing getNamespacesName as a GET method ?');
            return $response;
            });



$app->run();
