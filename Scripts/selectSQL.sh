#!/bin/bash
/opt/bitnami/mysql/bin/mysql -u root -p$(cat /home/bitnami/bitnami_application_password) -D EsportsEncyclopedia --table << EOF
SELECT * FROM Games;
SELECT * FROM Sponsors;
SELECT * FROM Teams;
SELECT * FROM Players;
SELECT * FROM Users;
EOF
