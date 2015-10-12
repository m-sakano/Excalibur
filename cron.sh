#!/bin/bash

php `dirname $0`/download.php 2>&1 >/dev/null
php `dirname $0`/scraping.php 2>&1 >/dev/null

exit
