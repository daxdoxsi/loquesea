<?php
# /git/pull.php?b19e5907cace4fe47b4e9b3aec52bd99d64caa64=9add4db50382481e99aa5e97d2283e67da6f84a7
$key = "b19e5907cace4fe47b4e9b3aec52bd99d64caa64";
$val = "9add4db50382481e99aa5e97d2283e67da6f84a7";

if (!isset($_GET[$key]) || !($_GET[$key] === $val)) die('Access Denied');

# Execute the pull request after a git push event
$commands = 'cd ../..;';
$commands .= 'export COMPOSER_HOME=/usr/local/bin/composer 2>&1;';
$commands .= 'git fetch 2>&1;';
$commands .= 'git pull 2>&1;';
$commands .= 'composer install 2>&1;';
$commands .= 'composer update 2>&1;';
$commands .= 'composer dump-autoload 2>&1;';
$commands .= '/usr/bin/git log -1 --format=format:%h > ./public/version.txt;';

# Running Commands
echo '<pre>';
passthru($commands);
echo '</pre>';