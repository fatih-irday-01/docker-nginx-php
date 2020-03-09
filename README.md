# docker-nginx-php
Debian 10 üzerinden **nginx** ve **php** kurulumtur. __docker-composer.yml__ dosyasında **MySql** ve **Redis** de ekli. kullanılmayacağı durumda kaldırılabilir.

<br />

## Makefile

<center>

|komut|işlev|
|---|---|
|make build|Dockerfile'ı build eder|
|make up|docker-compose içindeki container'ları çalıştırır|
|make up-build|**make build** ve **make up** komutlarını birlikte çalıştırır|
|make down|Çalıştırılmış container'ları kapatır|

</center>

<br />

## Docker Container'larının adı
Docker Container'larının adı `Makefile` dosyasından `ApplicationName := fatih` değişkeninden verilebilir.

<br />

## Container'lar
Uygulamalar `docker-composer.yml` dosyasından düzenlenebilir.

<br />

## Uygulamalar
**PHP** uygulamalar `webSite` klasörü içerisinde yer alır.

