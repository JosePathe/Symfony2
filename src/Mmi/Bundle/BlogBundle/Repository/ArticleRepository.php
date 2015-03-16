<?php

namespace Mmi\Bundle\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Description of ArticleRepository
 *
 * @author Johann Berthet
 */
class ArticleRepository extends EntityRepository {

	public function findByCurrentDate() {

		$queryBuilder = $this->createQueryBuilder('article');

		$date = new \DateTime();

		return $queryBuilder
		->select('article')
		->where('article.createdAt > :date')
		->setParameter('date', $date->format('Y-m-d 00:00:00'))
		->addOrderBy('article.createdAt', 'DESC') //affichage par date de création
		->getQuery()
		->getResult();

	}

}

?>