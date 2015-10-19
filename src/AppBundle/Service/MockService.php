<?php
/**
 * Created by PhpStorm.
 * User: kgurgul
 * Date: 2015-10-19
 * Time: 18:25
 */

namespace AppBundle\Service;


use AppBundle\Entity\Mock;
use Doctrine\ORM\EntityManager;

class MockService
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function generateMockUrl(Mock $mock)
    {
        $this->saveMockToDb($mock);
    }

    public function saveMockToDb(Mock $mock)
    {
        $this->entityManager->persist($mock);
        $this->entityManager->flush();
    }
}