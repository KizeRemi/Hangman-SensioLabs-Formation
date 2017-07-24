<?php
namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
	public function testContact ()
	{
		$client = static::createClient();
		$client->followRedirects(true);
		$crawler = $client->request('GET', '/signup');
		$this->assertSame(200, $client->getResponse()->getStatusCode());
		$crawler = $crawler->filter('#content p.attempts');

		// $this->assertSame('You still have 11 attempts!', $crawler->first()->text());

		// $crawler = $client->request('GET', '/game');
		// $link = $crawler->selectLink('A')->link();
		// $crawler = $client->click($link);
		// $crawler = $crawler->filter('#content p.attempts');

		// $this->assertSame('You still have 10 attempts!', $crawler->first()->text());
	}
}