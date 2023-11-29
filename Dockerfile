FROM php:8.2-cli
ADD . /usr/src/bubenparser
WORKDIR /usr/src/bubenparser
CMD [ "php", "./index.php" ]
