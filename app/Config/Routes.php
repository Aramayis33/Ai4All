<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('login', 'Home::login');
$routes->post('signup', 'Home::signUp');
$routes->post('logout', 'Home::logout');
$routes->get('projects', 'ProjectController::projects');
$routes->post('add-application','ProjectController::addUserProject');
$routes->get('discussion','DiscussionController::discussion');
$routes->post('discussion','DiscussionController::getDiscussionDetails');
$routes->post('send-message','DiscussionController::sendMessage');
$routes->post('leave-project','ProjectController::leaveProject');
$routes->get('ai-assistant','Home::assistant');
$routes->get('faq-contact','Home::contact');

