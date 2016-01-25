<?php

namespace Ojs\JournalBundle\Loader;

use Ojs\JournalBundle\Entity\MailTemplateRepository;
use Ojs\JournalBundle\Service\JournalService;
use Symfony\Component\HttpFoundation\RequestStack;

class MailTemplateLoader implements \Twig_LoaderInterface
{
    /** @var JournalService */
    protected $journalService;

    /** @var MailTemplateRepository */
    protected $repository;

    protected $cachePrefix;

    /** @var RequestStack */
    protected $requestStack;

    /**
     * MailTemplateLoader constructor.
     * @param MailTemplateRepository $repository
     * @param RequestStack           $requestStack
     * @param JournalService         $journalService
     * @param string                 $cachePrefix
     */
    public function __construct(
        MailTemplateRepository $repository,
        RequestStack $requestStack,
        JournalService $journalService,
        $cachePrefix = 'Mail'
    ) {
        $this->repository = $repository;
        $this->requestStack = $requestStack;
        $this->journalService = $journalService;
        $this->cachePrefix = $cachePrefix;
    }

    public function getSource($name)
    {
        if (strpos($name, $this->cachePrefix, 0) !== 0) {
            throw new \Twig_Error_Loader(sprintf('The "%s" template is not mail template', $name));
        }

        $parts = explode(':', $name);
        $templateType = $parts[1];

        $templates = $this->repository->findTemplatesByType($templateType);
        if (empty($templates)) {
            throw new \Twig_Error_Loader(sprintf('The "%s" template is not found', $name));
        }
        if (count($templates) === 1) {
            return $templates[0]['template'];
        }
        $preferredLangCodes = $this->preferredLangCodes();

        foreach ($preferredLangCodes as $preferredLangCode) {
            foreach ($templates as $template) {
                if ($template['code'] === $preferredLangCode) {
                    return $template['template'];
                }
            }
        }

        return $templates[0]['template'];
    }

    /**
     * @return array
     */
    public function preferredLangCodes()
    {
        $request = $this->requestStack->getCurrentRequest();

        $codes = [];
        $codes[] = $request->getLocale();
        if ($journal = $this->journalService->getSelectedJournal()) {
            $codes[] = $journal->getMandatoryLang()->getCode();
        }
        $codes[] = $request->getDefaultLocale();

        return $codes;
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
