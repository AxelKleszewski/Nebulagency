#!/usr/bin/env sh

echo "update marathon project "
rsync -rtv --exclude '.git'  . $NAME@172.31.146.106:/srv/comptes/marathon24/$NAME/www/
ssh $NAME@172.31.146.106 "/srv/comptes/marathon24/$NAME/www/resources/binaries/install.sh"

