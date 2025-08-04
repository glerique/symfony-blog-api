<?php

namespace App\Tests\Service;

use App\Service\AuthService;
use PHPUnit\Framework\TestCase;

class AuthServiceTest extends TestCase
{
    private AuthService $authService;

    protected function setUp(): void
    {
        $this->authService = new AuthService();
    }

    public function testServiceIsWorking(): void
    {
        $result = $this->authService->test();
        
        $this->assertEquals('AuthService is working!', $result);
        $this->assertIsString($result);
    }
}
