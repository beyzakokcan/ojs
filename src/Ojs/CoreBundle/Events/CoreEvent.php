<?php

namespace Ojs\CoreBundle\Events;

use Ojs\JournalBundle\Entity\Journal;
use Ojs\JournalBundle\Entity\Publisher;
use Ojs\UserBundle\Entity\User;
use Symfony\Component\EventDispatcher\Event;

class CoreEvent extends Event
{
    /**
     * @var Journal $journal
     */
    private $journal;

    /**
     * @var User $user
     */
    private $user;

    /**
     * @var string $eventType
     */
    private $eventType;

    /**
     * @param Journal|null $journal
     * @param Publisher|null $publisher
     * @param User|null $user
     * @param string $eventType
     */
    public function __construct(Journal $journal = null, Publisher $publisher = null, User $user = null, $eventType = '')
    {
        $this->journal = $journal;
        $this->user = $user;
        $this->eventType = $eventType;
    }

    /**
     * @return Journal
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->eventType;
    }
}
