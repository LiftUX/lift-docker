FROM php:fpm

RUN apt-get update && apt-get install -y \
		less \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libmcrypt-dev \
		libpng12-dev \
		libmemcached-dev \
		git \
		subversion \
	&& docker-php-ext-install -j$(nproc) iconv mcrypt \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	&& docker-php-ext-install -j$(nproc) gd \
	&& docker-php-ext-install mysqli \
	&& docker-php-ext-install pdo_mysql \
	&& docker-php-ext-install zip \
	&& apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN git clone https://github.com/php-memcached-dev/php-memcached /usr/src/php/ext/memcached \
	&& cd /usr/src/php/ext/memcached && git checkout -b php7 origin/php7 \
	&& docker-php-ext-configure memcached \
	&& docker-php-ext-install memcached

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && rm -rf /tmp/pear/

RUN { \
      echo ''; \
      echo 'xdebug.remote_enable=1'; \
      echo 'xdebug.remote_port="9000"'; \
    } >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Enable error reporting.
# https://github.com/docker-library/php/issues/153
RUN { \
      echo 'error_reporting=E_ALL'; \
      echo 'log_errors=On'; \
    } > /usr/local/etc/php/conf.d/errors.ini

# Make Zend Opcache stat files on every request instead of every 60s.
# https://github.com/docker-library/wordpress/pull/103
RUN { \
      echo 'opcache.memory_consumption=128'; \
      echo 'opcache.interned_strings_buffer=8'; \
      echo 'opcache.max_accelerated_files=4000'; \
      echo 'opcache.revalidate_freq=0'; \
      echo 'opcache.fast_shutdown=1'; \
      echo 'opcache.enable_cli=1'; \
    } > /usr/local/etc/php/conf.d/opcache-recommended.ini

RUN curl -sSL -o /usr/local/bin/phpunit "https://phar.phpunit.de/phpunit.phar" \
    && chmod +x /usr/local/bin/phpunit

RUN { \
      echo '#!/usr/bin/env sh'; \
      echo 'runuser -l www-data -s /bin/sh -c "cd $PHPUNIT_TEST_DIR; /usr/local/bin/phpunit $*"'; \
    } > /usr/local/bin/tests \
    && chmod +x /usr/local/bin/tests

RUN curl -O "https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar" \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp-cli

RUN mkdir -p /etc/wp-cli

RUN { \
      echo 'path: /var/www/public'; \
      echo "url: " $DOCKER_DEV_DOMAIN; \
    } > /etc/wp-cli/config.yml

RUN { \
      echo '#!/usr/bin/env sh'; \
      echo 'runuser -l www-data -s /bin/sh -c "WP_CLI_CONFIG_PATH=/etc/wp-cli/config.yml /usr/local/bin/wp-cli $*"'; \
    } > /usr/local/bin/wp \
    && chmod +x /usr/local/bin/wp

RUN curl -sSL "https://getcomposer.org/installer" | php \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/public

RUN git clone https://github.com/wordpress/wordpress.git .

RUN { \
      if [ -n $WP_IS_VIP ]; then \
        git clone --recursive https://github.com/automattic/vip-mu-plugins-public.git /var/www/public/wp-content/mu-plugins; \
      fi\
    }

RUN chown -R www-data:www-data /var/www/public

EXPOSE 9000