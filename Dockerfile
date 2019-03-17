FROM circleci/php

USER root

RUN apt-get update
RUN apt-get install -y gnupg1 gnupg2

USER circleci
