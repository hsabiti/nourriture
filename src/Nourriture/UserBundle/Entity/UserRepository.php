<?php

namespace Nourriture\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{

    public function findByRole($role){

	/*return $this->getEntityManager()
            ->createQuery(
                'SELECT u FROM UserBundle:User u WHERE u.roles LIKE :role'
            )->setParameter("role", "%$role%")
		->getResult(); */
	return $this->createQueryBuilder('u')
			->select('u,g')
			->leftJoin('u.groups', 'g')
			->leftJoin('u.profile', 'p')
			->where('u.roles LIKE :role')
			->orWhere('g.roles LIKE :role')
			->setParameter('role', "%$role%")
			->orderBy('u.username','ASC')
			->groupBy('u')
			->getQuery()
			->getResult();


    }
}
