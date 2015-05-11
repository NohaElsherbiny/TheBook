<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TaskRepository extends EntityRepository
{
	public function findByDateOrdered()
	{
		return $this->getEntityManager()
		->createQuery(
		'SELECT t FROM AppBundle:Task t ORDER BY t.task ASC'
		)
		->getResult();
	}
}