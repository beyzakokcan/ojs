<?php

namespace Ojs\JournalBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MailTemplateRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MailTemplateRepository extends EntityRepository
{
    /**
     * @param  string      $type
     * @param  null|string $langCode
     * @return array
     */
    public function findTemplatesByType($type, $langCode = null)
    {
        $queryBuilder = $this->createQueryBuilder('m')
            ->select('m.template, l.code')
            ->leftJoin('m.lang', 'l')
            ->leftJoin('m.type', 't')
            ->andWhere('t.name = :type')
            ->setParameter('type', $type);

        if ($langCode) {
            $queryBuilder = $queryBuilder
                ->andWhere('l.code = :langCode')
                ->setParameter('langCode', $langCode);
        }

        $query = $queryBuilder->getQuery();

        return $query->getArrayResult();
    }
}
