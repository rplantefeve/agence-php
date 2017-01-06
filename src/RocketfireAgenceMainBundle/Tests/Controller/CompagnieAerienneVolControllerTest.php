<?php

namespace RocketfireAgenceMainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CompagnieAerienneVolControllerTest extends WebTestCase
{
    public function testCreatecompagnieaeriennevol()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/CompagnieAerienneVol/add');
    }

    public function testUpdatecompagnieaeriennevol()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/CompagnieAerienneVol/edit/{id}');
    }

    public function testDeletecompagnieaeriennevol()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/CompagnieAerienneVol/delete/{id}');
    }

    public function testShowcompagnieaeriennevol()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/CompagnieAerienneVol/show/{id}');
    }

    public function testListcompagnieaeriennevol()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/CompagnieAerienneVol/list');
    }

}
