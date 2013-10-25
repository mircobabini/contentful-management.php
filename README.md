# contentful.php

PHP client for [Contentful's](https://www.contentful.com) Content Management API:

- [Documentation](https://www.contentful.com/developers/documentation/content-delivery-api)

## Usage

``` php
<?php namespace ContentfulManagement; // just for ease

// require the lib
require_once dirname (__FILE__) . '/../contentful.php';

// get an access token: https://www.contentful.com/developers/documentation/content-management-api/#getting-started
$ACCESS_TOKEN = 'ACCESS_TOKEN_HERE';

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
```

## License

[GPLv2](http://www.opensource.org/licenses/GPL-2.0)