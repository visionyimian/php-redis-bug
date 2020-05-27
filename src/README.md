# PHP 7.0.11 bug

## 使用

* 自己构建

```sh
cd docker;
docker build --build-arg http_proxy=http://192.168.6.47:7890 --build-arg https_proxy=http://192.168.6.47:7890 -t bug/phpredis/7.0.11 .
```

* 启动

```
cd docker/config;
docker-compose run php-worker
echo /tmp/core-%e-%p-%t /proc/sys/kernel/core_pattern
```

* 运行

```
/work/servers/php/bin/php -c /work/config/php/php.ini /work/php-scripts/bug.php
```

## 最后

实践 & enjoy it.


