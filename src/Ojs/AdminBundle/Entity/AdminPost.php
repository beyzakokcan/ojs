<?php

namespace Ojs\AdminBundle\Entity;

use APY\DataGridBundle\Grid\Mapping as GRID;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ojs\CoreBundle\Entity\GenericEntityTrait;
use Prezent\Doctrine\Translatable\Annotation as Prezent;
use Prezent\Doctrine\Translatable\Entity\AbstractTranslatable;

/**
 * AdminPost
 * @GRID\Source(columns="id, title")
 */
class AdminPost extends AbstractTranslatable
{
    use GenericEntityTrait;

    /**
     * @var integer
     * @GRID\Column(title="ID")
     */
    protected $id;
    /**
     * @Prezent\Translations(targetEntity="Ojs\AdminBundle\Entity\AdminPostTranslation")
     */
    protected $translations;
    /**
     * @var string
     * @GRID\Column(title="Title")
     */
    private $title;
    /**
     * @var string
     */
    private $content;
    /**
     * @var string
     */
    private $slug;
    /**
     * @var \DateTime
     */
    private $createdAt;
    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->translations = new ArrayCollection();
    }

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
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->translate()->getTitle();
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->translate()->setTitle($title);

        return $this;
    }

    /**
     * Translation helper method
     * @param null $locale
     * @return mixed|null|\Ojs\CmsBundle\Entity\PostTranslation
     */
    public function translate($locale = null)
    {
        if (null === $locale) {
            $locale = $this->currentLocale;
        }

        if (!$locale) {
            throw new \RuntimeException('No locale has been set and currentLocale is empty');
        }

        if ($this->currentTranslation && $this->currentTranslation->getLocale() === $locale) {
            return $this->currentTranslation;
        }

        $defaultTranslation = $this->translations->get($this->getDefaultLocale());
        if (!$translation = $this->translations->get($locale)) {
            $translation = new AdminPostTranslation();

            if(!is_null($defaultTranslation)){
                $translation->setTitle($defaultTranslation->getTitle());
            }

            $translation->setLocale($locale);
            $this->addTranslation($translation);
        }

        $this->currentTranslation = $translation;
        return $translation;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->translate()->getContent();
    }

    /**
     * Set content
     *
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->translate()->setContent($content);

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}

