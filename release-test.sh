#!/bin/bash

HOST=es2
THEME=ehrieric2
DIR=/var/www/wp_project_testing/wp-content/themes/$THEME

npm run sass
rsync -avl . --exclude .idea --exclude wp-uploads --exclude vendor --exclude node_modules --exclude .git $HOST:$DIR
