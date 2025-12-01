#!/bin/bash
#

./node_modules/.bin/sass scss/style.scss style.css

rsync -avl . --exclude release.sh --exclude .git --exclude .idea --exclude .gitignore --exclude node_modules --exclude *.iml  --exclude tmp ew2:/var/www/wordpress_project/wp-content/themes/ehriproject/
