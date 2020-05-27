from centos:7.2.1511

RUN /usr/bin/yum install lrzsz.x86_64 htop.x86_64 cmake.x86_64 openssl* ncurses-devel libaio.so.1 binutils-devel.x86_64 libevent libevent-devel libaio* freetype* libtool* libxml2* curl-devel libpng*   boost-devel* gperf* libevent-devel* libuuid-devel gcc-c++ bzip2 build-essential autoconf bison re2c libxml2-dev libsqlite3-dev openssl git automake gcc+ gcc-c++ libtool gdb vim nss-softokn-debuginfo –nogpgcheck yum-utils wget -y

RUN debuginfo-install -y cyrus-sasl-lib-2.1.26-19.2.el7.x86_64 glibc-2.17-307.el7.1.x86_64 krb5-libs-1.15.1-46.el7.x86_64 libcom_err-1.42.9-17.el7.x86_64 libcurl-7.29.0-57.el7.x86_64 libpng-1.5.13-7.el7_2.x86_64 libselinux-2.5-15.el7.x86_64 libssh2-1.8.0-3.el7.x86_64 libtool-ltdl-2.4.2-22.el7_3.x86_64 libxml2-2.9.1-6.el7.4.x86_64 nspr-4.21.0-1.el7.x86_64 nss-3.44.0-7.el7_7.x86_64 nss-softokn-freebl-3.44.0-8.el7_7.x86_64 nss-util-3.44.0-4.el7_7.x86_64 openldap-2.4.40-8.el7.x86_64 openssl-libs-1.0.2k-19.el7.x86_64 pcre-8.32-17.el7.x86_64 xz-libs-5.2.2-1.el7.x86_64 zlib-1.2.7-18.el7.x86_64

RUN mkdir -p /work/src/;\
    mkdir -p /work/servers/php;

COPY packages/libmcrypt-2.5.8.tar.gz /work/src/

COPY packages/openssl-1.0.1i.tar-2.gz /work/src/

RUN mkdir /work/lib

RUN cd /work/src/;\
    tar -zxvf /work/src/openssl-1.0.1i.tar-2.gz;\
    cd /work/src/openssl-1.0.1i;\
    make clean;\
    ./config --prefix=/work/lib/openssl;\
    make;\
    make install;

RUN cd /work/src;\
    tar -zxvf /work/src/libmcrypt-2.5.8.tar.gz;\
    cd /work/src/libmcrypt-2.5.8;\
    make clean;\
    ./configure;\
    make;\
    make install;\
    rm -rf /work/src/libmcrypt-2.5.8;

COPY /packages/redis-2.8.17.tar.gz /work/src/

RUN cd /work/src/;\
    tar -zxvf /work/src/redis-2.8.17.tar.gz;\
    cd /work/src/redis-2.8.17;\
    make PREFIX=/work/servers/redis install;\
    make install

RUN cd /work/src/;\
    wget https://github.com/php/php-src/archive/php-7.0.11.tar.gz;\
    tar -zxvf php-7.0.11.tar.gz;\
    cd php-src-php-7.0.11;\
    ./buildconf --force;\
    make clean;\
    ./configure --prefix=/work/servers/php --enable-mbstring --with-mysql --with-mysqli --with-mysql-sock --with-gd  --enable-pdo --with-pdo-mysql --enable-sockets --enable-bcmath --enable-xml --enable-zip --with-openssl=/work/lib/openssl --with-zlib --with-curl --enable-opcache --with-mcrypt;\
    make -j4;\
    make install

RUN cd /work/src/;\
    rm -rf phpredis;\
    git clone https://github.com/phpredis/phpredis.git;\
    cd phpredis;\
    git checkout 3.1.3;\
    make clean;\
    /work/servers/php/bin/phpize;\
    ./configure --with-php-config=/work/servers/php/bin/php-config;\
    make -j4;\
    make install;

RUN mkdir -p /work/config/php/

COPY config/php.ini /work/config/php/

COPY php-scripts /work/php-scripts

CMD ["/bin/bash"]