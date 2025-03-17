#!/bin/sh
# Execute php command in the LHN_v2 container
docker exec -it $(docker ps -aqf "name=^LHN_v2$") php "$@"