FROM debian:10

MAINTAINER 'fatihirday@gmail.com'

RUN apt-get update && \
    apt-get -y upgrade

# INSTALL PREREQUISITES
RUN apt-get install -y software-properties-common \
    build-essential \
    locales \
    unzip \
    sudo \
    wget \
    curl \
    htop \
    git \
    cron

# INSTALL LOCALES
RUN echo "en_US.UTF-8 UTF-8" >> /etc/locale.gen && \
    echo "tr_TR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

# PHP REPOSITORY
RUN apt-get -y install apt-transport-https lsb-release ca-certificates && \
    wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg && \
    sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'

# UPDATE PACKAGE INDEX
RUN apt-get update

# INSTALL PHP and PACKAGES
RUN apt-get install -y php7.3-fpm \
    php7.3-gd \
    php7.3-zip \
    php7.3-xml \
    php7.3-intl \
    php7.3-curl \
    php7.3-mbstring \
    php7.3-pdo-mysql \
    php-bcmath \
    php-redis


# INSTALL NGINX
RUN apt-get -y install nginx && \
    apt-get install -y libnginx-mod-http-headers-more-filter

# INSTALL SUPERVISOR
RUN apt-get install -y supervisor
RUN ln -s /var/www/html/.supervisor/supervisord.conf /etc/supervisord.conf

# REMOVE DEFAULT SITES
RUN rm /etc/nginx/sites-enabled/default && \
    rm /etc/nginx/sites-available/default

# INSTALL COMPOSER
RUN curl --silent https://getcomposer.org/download/1.9.0/composer.phar -o /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer

WORKDIR "/var/www/html"
CMD ["/bin/bash"]
RUN echo "mkdir /home/log" >> /home/serverStart.sh
RUN echo "service php7.3-fpm start" >> /home/serverStart.sh
RUN echo "/etc/init.d/nginx start" >> /home/serverStart.sh
RUN echo "supervisord -n -c /etc/supervisor/supervisord.conf" >> /home/serverStart.sh
ENTRYPOINT ["/bin/bash","/home/serverStart.sh"]
