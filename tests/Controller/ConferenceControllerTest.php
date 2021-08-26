<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConferenceControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET','/');

        $this->assertResponseIsSuccessful();;
        $this->assertSelectorTextContains('h2', 'Give your feedback');
    }

    public function testConferencePage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertCount(2, $crawler->filter('h1'));

        $client->clickLink('View');

        $this->assertPageTitleContains('Lalalend');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Lalalend 1999');
        $this->assertSelectorExists('div:contains("No comments hav been posted yet for this conference")');
    }

}