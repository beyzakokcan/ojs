<?php

namespace Ojstr\WorkflowBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * 
 * @MongoDb\Document(collection="journal_workflow_steps",repositoryClass="Ojstr\WorkflowBundle\Repository\JournalWorkflowStepRepository") 
 */
class JournalWorkflowStep {

    /**
     * @MongoDb\Id
     */
    protected $id;

    /** @MongoDb\Int */
    protected $journalid;

    /** @MongoDb\String */
    protected $title;

    /** @MongoDb\String */
    protected $status;

    /** @MongoDb\Boolean */
    protected $firststep;

    /** @MongoDb\Boolean */
    protected $laststep;

    /**
     * possible next steps 
     *  {
     * 	"0" : {
     * 		"id" : "53ba97facf93a1cf5e8b4567",
     * 		"title" : "First Review"
     * 	},
     * 	"1" : {
     * 		"id" : "53baa7aecf93a1dc268b456a",
     * 		"title" : "Redaction"
     * 	}
     * },
     * @MongoDB\Hash 
     */
    private $nextsteps;

    /**
     * 
     *  {
     * 	"0" : {
     * 		"id" : 7,
     * 		"name" : "Editor",
     * 		"role" : "ROLE_EDITOR"
     * 	},
     * 	"1" : {
     * 		"id" : 11,
     * 		"name" : "Copyeditor",
     * 		"role" : "ROLE_COPYEDITOR"
     * 	}
     * },
     * @MongoDB\Hash 
     */
    private $roles;

    /**
     * Default maxdays for this step for review
     * @MongoDB\Int
     */
    protected $maxdays;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set journalid
     *
     * @param int $journalid
     * @return self
     */
    public function setJournalid($journalid) {
        $this->journalid = $journalid;
        return $this;
    }

    /**
     * Get journalid
     *
     * @return int $journalid
     */
    public function getJournalid() {
        return $this->journalid;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return self
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return string $status
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set firststep
     *
     * @param boolean $firststep
     * @return self
     */
    public function setFirststep($firststep) {
        $this->firststep = $firststep;
        return $this;
    }

    /**
     * Get firststep
     *
     * @return boolean $firststep
     */
    public function getFirststep() {
        return $this->firststep;
    }

    /**
     * Set laststep
     *
     * @param boolean $laststep
     * @return self
     */
    public function setLaststep($laststep) {
        $this->laststep = $laststep;
        return $this;
    }

    /**
     * Get laststep
     *
     * @return boolean $laststep
     */
    public function getLaststep() {
        return $this->laststep;
    }

    /**
     * Set nextsteps
     *
     * @param hash $nextsteps
     * @return self
     */
    public function setNextsteps($nextsteps) {
        $this->nextsteps = $nextsteps;
        return $this;
    }

    /**
     * Get nextsteps
     *
     * @return hash $nextsteps
     */
    public function getNextsteps() {
        return $this->nextsteps;
    }

    /**
     * Set roles
     *
     * @param hash $roles
     * @return self
     */
    public function setRoles($roles) {
        $this->roles = $roles;
        return $this;
    }

    /**
     * Get roles
     *
     * @return hash $roles
     */
    public function getRoles() {
        return $this->roles;
    }

    /**
     * Set maxdays
     *
     * @param int $maxdays
     * @return self
     */
    public function setMaxdays($maxdays) {
        $this->maxdays = $maxdays;
        return $this;
    }

    /**
     * Get maxdays
     *
     * @return int $maxdays
     */
    public function getMaxdays() {
        return $this->maxdays;
    }

}
