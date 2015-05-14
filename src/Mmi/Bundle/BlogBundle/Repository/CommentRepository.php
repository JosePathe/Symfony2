<?php

namespace Mmi\Bundle\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Description of CommentRepository
 *
 * @author Johann Berthet
 */
class CommentRepository extends EntityRepository {

	public function findByCurrentDate() {

		$queryBuilder = $this->createQueryBuilder('comment');

		$date = new \DateTime();

		return $queryBuilder
		->select('comment')
		->where('comment.createdAt > :date')
		->setParameter('date', $date->format('Y-m-d 00:00:00'))
		->addOrderBy('comment.createdAt', 'DESC') //affichage par date de création
		->getQuery()
		->getResult();

	}

}

?>