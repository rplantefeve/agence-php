<?php

namespace RocketfireAgenceMainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdresseControllerTest extends WebTestCase
{
    public function testCreateadresse()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Adresse/add');
    }

    public function testShowadresse()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Adresse/show/{idAdd}');
    }

    public function testListadresse()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Adresse/list');
    }

    public function testEditadresse()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Adresse/edit/{idAdd}');
    }

    public function testDeleteadresse()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Adresse/delete/{idAdd}');
    }

}
