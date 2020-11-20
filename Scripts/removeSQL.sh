#!/bin/bash
/opt/bitnami/mysql/bin/mysql -u root -p$(cat /home/bitnami/bitnami_application_password) -D EsportsEncyclopedia --table<< EOF
DROP TABLE IF EXISTS Users CASCADE;
DROP TABLE IF EXISTS Players CASCADE;
DROP TABLE IF EXISTS Teams CASCADE;
DROP TABLE IF EXISTS Sponsors CASCADE;
DROP TABLE IF EXISTS Games CASCADE;
EOF