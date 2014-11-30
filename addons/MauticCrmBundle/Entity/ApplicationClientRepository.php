<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic Contributors. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.org
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticAddon\MauticCrmBundle\Entity;

use Mautic\CoreBundle\Entity\CommonRepository;

/**
 * ApplicationClientRepository
 */
class ApplicationClientRepository extends CommonRepository
{
    /**
     * @param      $alias
     * @param null $id
     * @param null $entity
     * @return mixed
     */
    public function getIdByAlias($alias, $entity = null)
    {
        $q = $this->createQueryBuilder('e')
            ->select('e.id')
            ->where('e.alias = :alias');
        $q->setParameter('alias', $alias);

        if (!empty($entity)) {
            $q->andWhere('e.id != :id');
            $q->setParameter('id', $entity->getId());
        }

        $results = $q->getQuery()->getSingleResult();
        return $results['id'];
    }

    /**
     * @param      $application
     * @param null $id
     * @param null $entity
     * @return mixed
     */
    public function getIdByApplication($application, $entity = null)
    {
        $q = $this->createQueryBuilder('e')
            ->select('e.id')
            ->where('e.application = :application');
        $q->setParameter('application', $application);

        if (!empty($entity)) {
            $q->andWhere('e.id != :id');
            $q->setParameter('id', $entity->getId());
        }

        $results = $q->getQuery()->getSingleResult();
        return $results['id'];
    }
}