<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class BaseTest extends TestCase
{

    use RefreshDatabase;

    private string $text;

    public function setUp(): void
    {
        parent::setUp();
    }
    

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
        // User::factory()->count(1)->make();
    }

    public function testThisIsMyTest()
    {
        $this->assertEquals('test', 'test');
        $this->assertSame('1', '1');        
    }
    
}
