.PHONY: vendor db

PHP=$(shell which php)
COMPOSER=./composer.phar

all: vendor

vendor: composer.phar
	$(COMPOSER) install

composer.phar:
	php -r "readfile('https://getcomposer.org/installer');" | php

test:
	./vendor/bin/phpunit

help:
	cat Makefile

