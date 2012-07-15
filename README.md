# RedisClusterClient

*RedisClusterClient handles sharding/caching of keys*

**Key points**

* *Simple:* just Redis protocol, nothing more
* *Requires nothing:* pure PHP implementation
* *Detects -MOVED and caches slot-node location
* *Connected to another node on -MOVED

**Usage example**

```php
$client = new RedisClusterClient( 'host:port' );
$client->set( 'key', 'value' );
$value = $client->get( 'key' );
```

