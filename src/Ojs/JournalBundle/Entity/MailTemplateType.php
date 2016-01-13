<?php

namespace Ojs\JournalBundle\Entity;

class MailTemplateType
{
    /** @var integer */
    protected $id;

    /** @var string */
    protected $name;

    /** @var array */
    protected $fields;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return MailTemplateType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param array $fields
     * @return MailTemplateType
     */
    public function setFields($fields)
    {
        $this->fields = $fields;

        return $this;
    }
}
