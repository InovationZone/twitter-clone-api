<?php

namespace TwitterCloneApi\src\Bean;

class Tweet
{
    private string $tweet;
    private \DateTime $dateWritten;

    public function __construct($tweet, $dateWritten)
    {
        $this->tweet = $tweet;
        $this->dateWritten = $dateWritten;
    }

    public function getTweet(): string
    {
        return $this->tweet;
    }

    public function getDateWritten(): \DateTime
    {
        return $this->dateWritten;
    }
}