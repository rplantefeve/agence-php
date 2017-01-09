<?php

namespace RocketfireAgenceMainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdresseControllerTest extends WebTestCase
{
    /*
    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();

<<<<<<< HEAD
<<<<<<< debug
        // Create a new entry in the database
        $crawler = $client->request('GET', '/Adresse/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /Adresse/");
        $crawler = $client->click($crawler->selectLink('Create a new entry')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'rocketfireagencemainbundle_adresse[field_name]'  => 'Test',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('td:contains("Test")')->count(), 'Missing element td:contains("Test")');

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Update')->form(array(
            'rocketfireagencemainbundle_adresse[field_name]'  => 'Foo',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('[value="Foo"]')->count(), 'Missing element [value="Foo"]');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Foo/', $client->getResponse()->getContent());
=======
=======
>>>>>>> AdresseVille
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
<<<<<<< HEAD
>>>>>>> Entité Adresse complète
=======
>>>>>>> AdresseVille
    }

    */
}
