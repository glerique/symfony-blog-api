<?php

declare(strict_types=1);

namespace App\Tests\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use PHPUnit\Framework\Attributes\Test;

class DocsTest extends WebTestCase
{
    #[Test]
    public function apiDocs(): void
    {
        $client = static::createClient();
        $client->request('GET', '/docs'); 

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
    }
}
