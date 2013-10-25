<?php namespace ContentfulManagement; // just for ease

// require the lib
require_once dirname (__FILE__) . '/../contentful-management.php';

// demo token from the official docs
$ACCESS_TOKEN = 'a1bef6fcaa2af5800f1e341fc9c6428e71e986ab0aeb8e862589f722f1759313';

// instance the client
$client = Client::get ($ACCESS_TOKEN);

// get the spaces
$spaces = $client->getSpaces ();

// get the first one
$space = $client->getSpace ($spaces->items[0]->sys->id);

// create a new one
$space = $client->createSpace ('Space Jam');

// reverse its name and update
$space = $client->updateSpace ($space->sys->id, strrev ($space->name), $space->sys->version);

// delete it
$space = $client->deleteSpace ($space->sys->id);


