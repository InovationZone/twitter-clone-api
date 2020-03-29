<?php

namespace Tests\Bean;

use PHPUnit\Framework\TestCase;
use TwitterCloneApi\src\Bean\User;

final class UserTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        $this->user = new User('João Paulo', 'joaopaulosil@yahoo.com.br', 'admin');
    }

    public function testGetName(): void
    {
        $this->assertEquals('João Paulo', $this->user->getName());
    }

    public function testGetEmail(): void
    {
        $this->assertEquals('joaopaulosil@yahoo.com.br', $this->user->getEmail());
    }

    public function testGetPassword(): void
    {
        $this->assertEquals('admin', $this->user->getPassword());
    }
}
