# DK Glass and Windows, Devon UK

Site code for <https://www.dkglassandwindows.co.uk/>

Use <https://github.com/craigbuckler/docker-php73/> to create an Apache, PHP, and SSL Docker image (named `php73`).

Launch from site folder:

```sh
docker run -it --rm -p 8080:80 -p 443:443 --name dkwindows -v "$PWD":/var/www/html php73
```

or:

```sh
docker-compose up
```

Then connect to <https://localhost/> or <http://localhost:8080/>

Attach to shell:

```sh
docker exec -it dkwindows bash
```

Changes:

* chmod 777 cache folder
* all paths set to `/` for local (index.php, header.php, header-render.php)
* index.php does not replace `/`
* TACS uses `__construct`
* TACS sets $CacheHTTPlocation with SERVER_NAME - the port is removed.
* various other updates!


TACS cannot currently read the HTTPS file, so the site must be available over HTTP as well as HTTPS.
Attempted fix for `file_get_contents` (line 276) did not work on live server?...

```php
$streamContext=array(
  "ssl"=>array(
    "verify_peer"=>false,
    "verify_peer_name"=>false,
  ),
);

$content = @file_get_contents($this->cachehttp.'p'.$this->cachefile, false, stream_context_create($streamContext));
```
