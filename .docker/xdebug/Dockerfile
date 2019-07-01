FROM php:7.3.6-cli-stretch

ENV XDEBUG_VERSION 2.7.2
ENV XDEBUG_SHA256 b0f3283aa185c23fcd0137c3aaa58554d330995ef7a3421e983e8d018b05a4a6

RUN set -x \
	&& curl -SL "http://www.xdebug.org/files/xdebug-$XDEBUG_VERSION.tgz" -o xdebug.tgz \
	&& echo $XDEBUG_SHA256 xdebug.tgz | sha256sum -c - \
	&& mkdir -p /usr/src/xdebug \
	&& tar -xf xdebug.tgz -C /usr/src/xdebug --strip-components=1 \
	&& rm xdebug.* \
	&& cd /usr/src/xdebug \
	&& phpize \
	&& ./configure \
	&& make -j"$(nproc)" \
	&& make install \
	&& make clean

RUN echo "zend_extension=xdebug.so \n\r \
xdebug.remote_enable=1 \n\r \
xdebug.remote_autostart=1 \n\r \
xdebug.remote_connect_back=0" >> /usr/local/etc/php/conf.d/ext-xdebug.ini
