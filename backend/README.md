# Dev Environment

https://code.visualstudio.com/docs/remote/containers

This project has everything it needs to be run inside a vscode devcontainer including a MariadB database  
Details can be found under 


## Code Style
See CodeStyle.md for details

## Requirements

An API based guestbook backend that that can do the following
### public
- Accept new guestbook entries
- Fetch existing entries (paged with dynamic page size)
- Search within existing entries (name & message)
### password protected (admin)
- hide entries from being visible on the page
- delete entries from the database
- block an ip or email domain

### Further Features
- E-Mail should be checked to be valid
- Spam protection from the same IPs
- Blacklist for keywords and email providers


## Database Credentials
the credentials can be found in config.php and just need to be included

```php
$config = require('config.php');

var_dump($config['database']);
```

example can be found under dbtest.php

## run server

Go to the debug tools and use the "Launch Built-in web server" option to get a development server including x-debug up and running

Alternative
```php

php -S 0.0.0.0:8080

```