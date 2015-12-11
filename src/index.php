<?php
/**
 * EduGraphAPI
 * @version 1.0.0
 */

require_once __DIR__ . '/vendor/autoload.php';

$app = new Slim\App();


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
            
            
            
            
            $response->write('How about implementing getInstitutions as a GET method ?');
            return $response;
            });


/**
 * GET getInstitutionsCurie
 * Summary: Delivers a specific institution.
 * Notes: Delivers a specific institution.
 * Output-Formats: [application/json]
 */
$app->GET('/institutions/{curie}', function($request, $response, $args) {
            
            
            
            
            $response->write('How about implementing getInstitutionsCurie as a GET method ?');
            return $response;
            });


/**
 * GET getNamespaces
 * Summary: List all available namespaces.
 * Notes: List all available namespaces.
 * Output-Formats: [application/json]
 */
$app->GET('/namespaces', function($request, $response, $args) {
            
            
            
            
            $response->write('How about implementing getNamespaces as a GET method ?');
            return $response;
            });


/**
 * GET getNamespacesName
 * Summary: Delivers a specific namespace.
 * Notes: Delivers a specific namespace.
 * Output-Formats: [application/json]
 */
$app->GET('/namespaces/{name}', function($request, $response, $args) {
            
            
            
            
            $response->write('How about implementing getNamespacesName as a GET method ?');
            return $response;
            });



$app->run();
