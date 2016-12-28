<?php

namespace ZFTest\OAuth2\Doctrine\Identity;

use Zend\Stdlib\Request;

class UserTest extends AbstractTest
{
    /** @dataProvider provideStorage */
    public function testAuthenticatedUser()
    {
        $serviceManager = $this->getApplication()->getServiceManager();
        $objectManager = $serviceManager->get('doctrine.entitymanager.orm_default');

        $request = $this->getRequest();
        $request->getHeaders()->addHeaderLine('Accept', 'application/json');
        $request->getHeaders()->addHeaderLine('Content-Type', 'application/json');
        $request->getHeaders()->addHeaderLine('Authorization', 'Basic b2F1dGhfdGVzdF9jbGllbnQ6dGVzdHBhc3M=');
        //print_r(get_class_methods($request));die();
        $request->setMethod('POST');
        $request->setContent('
            {
                "username": "oauth_test_user",
                "password": "testpass",
                "grant_type": "password",
                "client_id": "oauth_test_client",
                "client_secret": "testpass"
            }
        ');

        $this->dispatch('/oauth');
        $access_token = json_decode($this->getResponse()->getBody(), true)['access_token'];

        $request = $this->getRequest();
        $request->getHeaders()->addHeaderLine('Accept', 'application/json');
        $request->getHeaders()->addHeaderLine('Authorization', 'Bearer ' . $access_token);
        //print_r(get_class_methods($request));die();
        $request->setMethod('GET');
        $this->dispatch('/user');

        $authorization = $serviceManager->get('authentication');
        $identity = $authorization->getIdentity();

        $this->assertTrue($identity instanceof \ZF\OAuth2\Doctrine\Identity\AuthenticatedIdentity);
        $this->assertTrue($identity->getUser() instanceof \ZFTest\OAuth2\Doctrine\Identity\Entity\User);
        $this->assertTrue($identity->getClient() instanceof \ZF\OAuth2\Doctrine\Entity\Client);
        $this->assertTrue($identity->getAccessToken() instanceof \ZF\OAuth2\Doctrine\Entity\AccessToken);
        $this->assertTrue($identity->getAuthorization() instanceof \ZF\MvcAuth\Authorization\AuthorizationInterface);
        $this->assertEquals('doctrine', $identity->getRoleId());
        $this->assertTrue(is_array($identity->getAuthenticationIdentity()));
    }

    /**
     * @expectedE xception ZF\OAuth2\Doctrine\Permissions\Acl\Exception\AccessTokenException
     */
    public function testInvalidAccessToken()
    {
        $request = $this->getRequest();
        $request->getHeaders()->addHeaderLine('Accept', 'application/json');
        $request->getHeaders()->addHeaderLine('Authorization', 'Bearer invalid_access_token');
        $request->setMethod('GET');
        $this->dispatch('/role');

        $serviceManager = $this->getApplication()->getServiceManager();
        $authorization = $serviceManager->get('authentication');
        $identity = $authorization->getIdentity();

        $this->assertTrue(is_null($identity));
    }
}
