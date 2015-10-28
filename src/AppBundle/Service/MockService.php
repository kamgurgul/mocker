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
    private $mockRepository;

    public function __construct(EntityManager $entityManager, Utils $utils)
    {
        $this->entityManager = $entityManager;
        $this->utils = $utils;

        $this->mockRepository = $this->entityManager->getRepository('AppBundle:Mock');
    }

    public function generateMockUrl(Mock $mock)
    {
        $mock->setUrl($this->utils->generateUUIDWithUserId($mock->getUserId()));
        $this->mockRepository->saveMock($mock);

        return $mock->getUrl();
    }

    public function getMock($mockUrl)
    {
        return $this->mockRepository->getMockByUrl($mockUrl);
    }
}