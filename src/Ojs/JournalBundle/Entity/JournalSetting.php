<?php

namespace Ojs\JournalBundle\Entity;

use Gedmo\Translatable\Translatable;
use Ojs\CoreBundle\Entity\GenericEntityTrait;
use Prezent\Doctrine\Translatable\Annotation as Prezent;

/**
 * Journal key-value settings
 */
class JournalSetting implements Translatable, JournalItemInterface
{
    use GenericEntityTrait;

    /**
     * @var Journal
     */
    private $journal;
    /**
     * @var string
     */
    private $setting;
    /**
     * @var string
     */
    private $value;

    /**
     *
     * @param string  $setting
     * @param string  $value
     * @param Journal $journal
     */
    public function __construct($setting, $value, $journal)
    {
        $this->setting = $setting;
        $this->value = $value;
        $this->journal = $journal;
    }

    /**
     * Get setting
     *
     * @return string
     */
    public function getSetting()
    {
        return $this->setting;
    }

    /**
     * Set setting
     *
     * @param  string         $setting
     * @return JournalSetting
     */
    public function setSetting($setting)
    {
        $this->setting = $setting;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param  string         $value
     * @return JournalSetting
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get journal
     *
     * @return Journal
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * Set journal
     *
     * @param  Journal        $journal
     * @return JournalSetting
     */
    public function setJournal(Journal $journal)
    {
        $this->journal = $journal;

        return $this;
    }
}
