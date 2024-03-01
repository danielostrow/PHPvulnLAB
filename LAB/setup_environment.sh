#!/bin/bash

# Start Apache server in the background
/usr/sbin/apache2ctl start

# Keep the container running in the foreground
tail -f /dev/null

