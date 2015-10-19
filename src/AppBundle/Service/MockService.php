<?php
/**
 * Created by PhpStorm.
 * User: kgurgul
 * Date: 2015-10-19
 * Time: 18:25
 */

namespace AppBundle\Service;


use AppBundle\Entity\Mock;
use AppBundle\Utils\Utils;
use Doctrine\ORM\EntityManager;

class MockService
{
    private $entityManager;
    private $utils;

    public function __construct(EntityManager $entityManager, Utils $utils)
    {
        $this->entityManager = $entityManager;
        $this->utils = $utils;
    }

    public function generateMockUrl(Mock $mock)
    {
        $mock->setUrl($this->utils->generateUUIDWithUserId($mock->getUserId()));
        $this->saveMockToDb($mock);
    }

    public function saveMockToDb(Mock $mock)
    {
        $this->entityManager->persist($mock);
        $this->entityManager->flush();
    }
}