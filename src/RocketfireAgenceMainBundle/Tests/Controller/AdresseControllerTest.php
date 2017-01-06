<?php

namespace RocketfireAgenceMainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdresseControllerTest extends WebTestCase
{
    public function testCreateadresse()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/create/add');
    }

}
