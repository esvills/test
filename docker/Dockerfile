FROM php:7.3-fpm-alpine

# Install dev dependencies
RUN apk add --no-cache --virtual .build-deps \
    $PHPIZE_DEPS \
    curl-dev \
    imagemagick-dev \
    libtool \
    libxml2-dev \
    sqlite-dev \
    make

# Install production dependencies
RUN apk add --no-cache \
    bash \
    curl \
    g++ \
    gcc \
    git \
    imagemagick \
    libc-dev \
    libpng-dev \
    make \
    mysql-client \
    nodejs \
    nodejs-npm \
    yarn \
    openssh-client \
    zlib-dev \
    libzip-dev

# Install PECL and PEAR extensions
RUN pecl install

RUN docker-php-ext-configure zip --with-libzip

RUN docker-php-ext-install \
    curl \
    exif \
    iconv \
    mbstring \
    pdo \
    pdo_mysql \
    pcntl \
    tokenizer \
    xml \
    gd \
    zip \
    bcmath
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer\
    && composer --ansi --version --no-interaction \
    && composer clear-cache \
    && rm -rf /tmp/composer-setup.php /tmp/.htaccess

# Cleanup dev dependencies
RUN apk del -f .build-deps

WORKDIR /var/www

COPY ./php/start.sh /var/start.sh
RUN chmod +x /var/start.sh

ENTRYPOINT ["/var/start.sh"]
