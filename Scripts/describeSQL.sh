#!/bin/bash
/opt/bitnami/mysql/bin/mysql -u root -p$(cat /home/bitnami/bitnami_application_password) -D EsportsEncyclopedia --table << EOF
DESCRIBE Games;
DESCRIBE Sponsors;
DESCRIBE Teams;
DESCRIBE Players;
DESCRIBE Users;
EOF
