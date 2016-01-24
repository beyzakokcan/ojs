<?php

namespace Ojs\JournalBundle\Entity;

use APY\DataGridBundle\Grid\Mapping as GRID;
use Gedmo\Translatable\Translatable;
use Ojs\CoreBundle\Entity\GenericEntityTrait;
use Prezent\Doctrine\Translatable\Annotation as Prezent;

/**
 * MailTemplate
 * @GRID\Source(columns="id,type.name,subject,lang.name")
 */
class MailTemplate implements Translatable, JournalItemInterface
{
    use GenericEntityTrait;
    /**
     * @var integer
     * @GRID\Column(title="ID")
     */
    private $id;
    /**
     * @var MailTemplateType
     * @GRID\Column(field="type.name", title="mailtemplate.type")
     */
    private $type;
    /**
     * @var Lang
     * @GRID\Column(field="lang.name", title="lang")
     */
    private $lang;
    /**
     * @var string
     */
    private $subject;
    /**
     * @var string
     */
    private $template;
    /**
     *
     * @var Journal
     */
    private $journal;
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get type
     *
     * @return MailTemplateType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param  string       $type
     * @return MailTemplate
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set subject
     *
     * @param  string       $subject
     * @return MailTemplate
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get lang
     *
     * @return Lang
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set lang
     *
     * @param  Lang       $lang
     * @return MailTemplate
     */
    public function setLang(Lang $lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get template
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set template
     *
     * @param  string       $template
     * @return MailTemplate
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     *
     * @return Journal
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     *
     * @param  Journal      $journal
     * @return MailTemplate
     */
    public function setJournal(Journal $journal)
    {
        $this->journal = $journal;

        return $this;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return MailTemplate
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return MailTemplate
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    public function __toString()
    {
        return $this->getSubject();
    }
}
