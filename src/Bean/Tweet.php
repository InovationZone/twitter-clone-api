<?php

namespace TwitterCloneApi\src\Bean;

class Tweet
{
    private string $tweet;
    private \DateTime $writtenAt;

    public function __construct($tweet, $writtenAt)
    {
        $this->tweet = $tweet;
        $this->writtenAt = $writtenAt;
    }

    public function getTweet(): string
    {
        return $this->tweet;
    }

    public function getWrittenAt(): \DateTime
    {
        return $this->writtenAt;
    }
}