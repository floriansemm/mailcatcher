mailcatcher
===========

Installation
============

1. clone the project
2. configure a vhost, document root is `web`
3. make `app/client.php` executable
3. uncomment the `sendmail_path` and add the mailcatcher script
```
sendmail_path = /path/to/mailcatcher/app/client.php
```
