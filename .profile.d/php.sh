#!/bin/bash
export PHP_INI_SCAN_DIR=/app/.heroku/php/etc/php/conf.d:/app/.profile.d
echo "extension=intl.so" > /app/.profile.d/intl.ini