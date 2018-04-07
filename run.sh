#!/bin/bash
(php -S localhost:8000 -t server) &
(php -S localhost:8001 -t client) &
echo 'Servers online, execute the kill-servers.sh file to close them.'
xdg-open http://localhost:8001/