<?php

namespace Tests\Bean;

use PHPUnit\Framework\TestCase;
use TwitterCloneApi\src\Bean\Tweet;

final class TweetTest extends TestCase
{
    private Tweet $tweet;

    protected function setUp(): void
    {
        $dateTime = \DateTime::createFromFormat('d-m-Y H:i:s', '29-03-2020 15:09:00');

        $this->tweet = new Tweet('Meu primeiro tweet', $dateTime);
    }

    public function testGetTweet(): void
    {
        $this->assertEquals('Meu primeiro tweet', $this->tweet->getTweet());
    }

    public function testGetDateWritten(): void
    {
        $this->assertEquals(
            '29-03-2020 15:09:00',
            $this->tweet->getWrittenAt()->format('d-m-Y H:i:s')
        );
    }
}
