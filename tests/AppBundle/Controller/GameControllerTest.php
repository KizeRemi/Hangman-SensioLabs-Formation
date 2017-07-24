<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class GameControllerTest extends WebTestCase
{
    private $client = null;

    public function setUp() {
        $this->client = static::createClient();
    }

    public function testGame()
    {
        $this->setUp();
        $this->logIn();
        $client = $this->client;
        $client->followRedirects(true);
        $crawler = $client->request('GET', '/game');
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $crawler = $crawler->filter('#content p.attempts');

        $this->assertSame('You still have 11 attempts!', $crawler->first()->text());

        $crawler = $client->request('GET', '/game');
        $link = $crawler->selectLink('X')->link();
        $crawler = $client->click($link);
        $crawler = $crawler->filter('#content p.attempts');

        $this->assertSame('You still have 10 attempts!', $crawler->first()->text());

    }

    public function logIn() {
        $session = $this->client->getContainer()->get('session');

        $firewallContext = 'main';

        $token = new UsernamePasswordToken('admin', null, $firewallContext, array('ROLE_USER'));
        $session->set('_security_' . $firewallContext, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }
}