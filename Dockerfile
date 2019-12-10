FROM phpdockerio/php73-fpm:latest
WORKDIR "/application"

RUN apt-get update \
    && apt-get -y --no-install-recommends install  php7.3-imap \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
