<?php

  require_once dirname( __FILE__ ) . '/RedisClusterClient.class.php';

  $client = new RedisClusterClient( $argv[ 1 ] );

  $client->del( 'test:key1' );
  $client->del( 'test:key2' );
  $client->del( 'test:key3' );

  assert( $client->set( 'test:key1', 'value1' ) === 'OK' );
  assert( $client->set( 'test:key2', 'value2' ) === 'OK' );
  assert( $client->set( 'test:key3', 'value3' ) === 'OK' );

  assert( $client->get( 'test:key1' ) === 'value1' );
  assert( $client->get( 'test:key2' ) === 'value2' );
  assert( $client->get( 'test:key3' ) === 'value3' );

  assert( $client->del( 'test:key1' ) === '1' );
  assert( $client->del( 'test:key2' ) === '1' );
  assert( $client->del( 'test:key3' ) === '1' );

  assert( $client->get( 'test:key1' ) === null );
  assert( $client->get( 'test:key2' ) === null );
  assert( $client->get( 'test:key3' ) === null );


  $client->del( 'test:key' );

  assert( $client->sadd( 'test:key', 'item1' ) === '1' );
  assert( $client->sadd( 'test:key', 'item2' ) === '1' );
  assert( $client->smembers( 'test:key' ) === array( 'item1', 'item2' ) );
  assert( $client->scard( 'test:key' ) === '2' );
  assert( $client->del( 'test:key' ) === '1' );
  assert( $client->scard( 'test:key' ) === '0' );
  assert( $client->smembers( 'test:key' ) === array() );
