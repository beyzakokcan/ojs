<?php

namespace Ojs\JournalBundle\Loader;

use Doctrine\ORM\UnexpectedResultException;
use Ojs\JournalBundle\Entity\Journal;
use Ojs\JournalBundle\Entity\MailTemplateRepository;
use Ojs\JournalBundle\Service\JournalService;

class MailTemplateLoader implements \Twig_LoaderInterface
{
    /** @var Journal */
    protected $journal;

    /** @var MailTemplateRepository */
    protected $repository;

    protected $cachePrefix;

    /**
     * MailTemplateLoader constructor.
     * @param JournalService $journalService
     * @param MailTemplateRepository $repository
     * @param string $cachePrefix
     */
    public function __construct(
        JournalService $journalService,
        MailTemplateRepository $repository,
        $cachePrefix = 'Mail'
    ) {
        $this->repository = $repository;
        $this->cachePrefix = $cachePrefix;
        if ($journal = $journalService->getSelectedJournal()) {
            $this->cachePrefix .= $journal->getId();
            $this->journal = $journal;
        }
    }

    public function getSource($name)
    {
        if (strpos($name, $this->cachePrefix, 0) !== 0) {
            throw new \Twig_Error_Loader(sprintf('The "%s" template is not mail template', $name));
        }
        $parts = explode(':', $name);
        $templateType = $parts[1];
        $lang = $parts[2];

        try {
            return $this->repository->findByTemplate($templateType, $lang);
        } catch (UnexpectedResultException $e) {
            throw new \Twig_Error_Loader(sprintf('The "%s" template is not found', $name));
        }
    }

    public function getCacheKey($name)
    {
        if (strpos($name, $this->cachePrefix, 0) !== 0) {
            throw new \Twig_Error_Loader(sprintf('The "%s" template is not mail template', $name));
        }

        return $this->cachePrefix.$name;
    }

    public function isFresh($name, $time)
    {
        return false;
    }
}
