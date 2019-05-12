FROM ubuntu:latest

RUN export LANG=en_US.UTF-8 \
  && apt-get update \
  && apt-get install -y apt-transport-https \
  && apt-get -y install apache2

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid
ENV APACHE_RUN_DIR /var/run/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
RUN ln -sf /dev/stdout /var/log/apache2/access.log && \
    ln -sf /dev/stderr /var/log/apache2/error.log
RUN mkdir -p $APACHE_RUN_DIR $APACHE_LOCK_DIR $APACHE_LOG_DIR

RUN apt-get install -y php libapache2-mod-php

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php //cài composer
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install git

VOLUME [ "/var/www/html" ]
WORKDIR /var/www/html

EXPOSE 80

ENTRYPOINT [ "/usr/sbin/apache2" ]
CMD ["-D", "FOREGROUND"]