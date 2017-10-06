OAuth2 Doctrine Identity
------------------------

[![Build Status](https://travis-ci.org/API-Skeletons/zf-oauth2-doctrine-identity.svg)](https://travis-ci.org/API-Skeletons/zf-oauth2-doctrine-identity)
[![Total Downloads](https://poser.pugx.org/api-skeletons/zf-oauth2-doctrine-identity/downloads)](https://packagist.org/packages/api-skeletons/zf-oauth2-doctrine-identity)

Versions
--------

1.x for PHP 5.5 to 7.0.  2.x for PHP 7.1 onward.


About
-----

By default [zfcampus/zf-mvc-auth](https://github.com/zfcampus/zf-mvc-auth) returns an [`ZF\MvcAuth\Identity\AuthenticatedIdentity`](https://github.com/zfcampus/zf-mvc-auth/blob/master/src/Identity/AuthenticatedIdentity.php) when authenticated with a valid access token.  This repository replaces that identity with a [`ZF\OAuth2\Doctrine\Identity\AuthenticatedIdentity`](https://github.com/API-Skeletons/zf-oauth2-doctrine-identity/blob/master/src/AuthenticatedIdentity.php).

[`ZF\OAuth2\Doctrine\Identity\AuthenticatedIdentity`](https://github.com/API-Skeletons/zf-oauth2-doctrine-identity/blob/master/src/AuthenticatedIdentity.php) stores the [api-skeletons/zf-oauth2-doctrine](https://github.com/API-Skeletons/zf-oauth2-doctrine) `AccessToken` Doctrine entity.  The `AuthentiatedIdentity` has the functions `getUser()`, `getAccessToken()`, `getClient()` which return entities.  With these your application can continue to work with ORM through the rest of the request lifecycle.

[api-skeletons/zf-oauth2-doctrine](https://github.com/API-Skeletons/zf-oauth2-doctrine) supports multiple OAuth2 configurations and [api-skeletons/zf-oauth2-doctrine-identity](https://github.com/API-Skeletons/zf-oauth2-doctrine-identity) searches through each configuration to find the `AccessToken` entity based on the `access_token` and `client_id` supplied by [`ZF\MvcAuth\Identity\AuthenticatedIdentity`](https://github.com/zfcampus/zf-mvc-auth/blob/master/src/Identity/AuthenticatedIdentity.php).


Authorization
-------------

The zf-mvc-auth Authorization Service is injected into the `AuthenticatedIdentity`.  You may fetch the Authorization Service with `$identity->getAuthorizationService()`.  There is a convenience method for ACL `$identity->isAuthorized($resource, $privilege)`.

Installation
------------
Installation of this module uses composer. For composer documentation, please refer to [getcomposer.org](http://getcomposer.org/).

```sh
composer require api-skeletons/zf-oauth2-doctrine-identity
```

This will be added to your application's list of modules:

```php
'modules' => array(
   ...
   'ZF\OAuth2\Doctrine\Identity',
),
```
