<?php namespace ContentfulManagement; // just for ease

// require the lib
require_once dirname (__FILE__) . '/../contentful-management.php';

// demo token from the official docs
$ACCESS_TOKEN = 'a1bef6fcaa2af5800f1e341fc9c6428e71e986ab0aeb8e862589f722f1759313';

// instance the client
$client = Client::get ($ACCESS_TOKEN);
ensure ($client instanceof Client);


// get the spaces
$spaces = $client->getSpaces ();
ensure (!!@$spaces->sys->type && $spaces->sys->type !== 'Error');

$first_space = $spaces->items[0];
$first_space_id = $first_space->sys->id;
$first_space_name = $first_space->name;


// get the first one
$space = $client->getSpace ($first_space_id);
ensure (!!@$space->sys->type && $space->sys->type !== 'Error');
ensure ($first_space_name == $space->name);

// create a new one
$space = $client->createSpace ('Space Jam');
ensure (!!@$space->sys->type && $space->sys->type !== 'Error');

$space_name_rev = strrev ($space->name);
$space_version = $space->sys->version;


// reverse its name and update
$space = $client->updateSpace ($space->sys->id, array ('name' => $space_name_rev), $space_version);
ensure (!!@$space->sys->type && $space->sys->type !== 'Error');
ensure ($space_name_rev == $space->name);

// delete it
$space = $client->deleteSpace ($space->sys->id);
ensure ($space === null);




