<?php

namespace RocketfireAgenceMainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VilleControllerTest extends WebTestCase
{
    public function testCreateville()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Ville/add');
    }

}
