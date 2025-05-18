<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserScoreTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
    public function testUserScoreCalculation()
    {
        $user = new User();
        $user->posts = 4;
        $user->comments = 6;

        $score = $user->posts * 5 + $user->comments * 2;

        $this->assertEquals(32, $score); // (4*5 + 6*2)
    }
}
