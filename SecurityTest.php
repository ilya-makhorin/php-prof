<?php
namespace App\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
class SecurityTest extends WebTestCase
{
    public function testLogin()
    {
        $client =static::createClient();
        $client -> request('GET','/login');
        $client->clickLink('Site');
        $this->assertSelectorTextContains('h1','Symfony');

    }
}
