mailcatcher
===========

Email testing is always complicated:

- your local enviromnent hasn't a configured SMTP server
- the global mail server is damn slow
- your spam filter impremeable configured

This app should solve a couple of your problems:

- easy setup
- fancy shiny GUI

Installation
============

1. clone the project
2. configure a vhost, document root is `web`
3. make `app/client.php` executable
4. uncomment the `sendmail_path` and add the mailcatcher script
```
sendmail_path = /path/to/mailcatcher/app/client.php
```
