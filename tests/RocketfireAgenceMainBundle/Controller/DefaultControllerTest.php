<?php

namespace RocketfireAgenceMainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/default');

        $this->assertContains('<body>Hello World!</body>', $client->getResponse()->getContent());
    }
}
