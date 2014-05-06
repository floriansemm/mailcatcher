Mailcatcher
===========

Email testing is always complicated:

- your local enviromnent hasn't a configured SMTP server
- the global mail server is damn slow
- your spam filter impremeable configured

This app should solve a couple of your problems:

- easy setup
- fancy shiny GUI

Mailcatcher hooks into the `mail` function, it parsed the mail and persist all important imformations in a sqlite-db.

Mailcatcher is written in PHP with Silex and Doctrine2.

Quick-Installation (PHP5.4 required)
====================================

- clone the project
- make `app/client.php` executable
- uncomment the `sendmail_path` and add the mailcatcher script
```
sendmail_path = /path/to/mailcatcher/app/client.php
```
- make `bin/start_server` executable and execute `./bin/start_server`

After this you can reach Mailcatcher under http://localhost:8080


Installation with PHP5.3
========================

Follow the steps 1-3 from above. Then you have to create a vhost in your webserver configuration. The document-root must point on `web`.

