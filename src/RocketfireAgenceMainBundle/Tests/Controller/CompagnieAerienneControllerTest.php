<?php

namespace RocketfireAgenceMainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CompagnieAerienneControllerTest extends WebTestCase
{
    public function testCreatecompagnieaerienne()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/CompagnieAerienne/add');
    }

    public function testUpdatecompagnieaerienne()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/CompagnieAerienne/edit/{id}');
    }

    public function testDeletecompagnieaerienne()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/CompagnieAerienne/delete/{id}');
    }

    public function testShowcompagnieaerienne()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/CompagnieAerienne/show/{id}');
    }

    public function testListcompagnieaerienne()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/CompagnieAerienne/list');
    }
}
