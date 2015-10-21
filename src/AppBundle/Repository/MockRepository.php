<?php
/**
 * Created by PhpStorm.
 * User: kgurgul
 * Date: 2015-10-19
 * Time: 18:26
 */

namespace AppBundle\Repository;

use AppBundle\Entity\Mock;
use Doctrine\ORM\EntityRepository;
use Proxies\__CG__\AppBundle\Entity\Header;

class MockRepository extends EntityRepository
{
    public function getMockByUrl($mockUrl)
    {
        $result = $this->getEntityManager()->createQueryBuilder()
            ->select('
                m.id as mockId,
                m.userId,
                m.url,
                m.method,
                m.responseStatus,
                m.body,
                m.createdAt,
                m.blocked,
                m.deleted,
                h.id as headerId,
                h.headerKey,
                h.headerValue
            ')
            ->from('AppBundle:Mock', 'm')
            ->leftJoin('m.headers', 'h')
            ->where('m.url = :url')
            ->setMaxResults(1)
            ->setParameter(':url', $mockUrl)
            ->getQuery()
            ->execute();

        if ($result != null) {
            return $this->parseDBDataToObject($result);
        } else {
            return null;
        }
    }

    private function parseDBDataToObject($dbMock)
    {
        $mock = new Mock();

        $mock->setId($dbMock[0]['mockId']);
        $mock->setUserId($dbMock[0]['userId']);
        $mock->setUrl($dbMock[0]['url']);
        $mock->setMethod($dbMock[0]['method']);
        $mock->setResponseStatus($dbMock[0]['responseStatus']);
        $mock->setBody($dbMock[0]['body']);
        $mock->setCreatedAt($dbMock[0]['createdAt']);
        $mock->setBlocked($dbMock[0]['blocked']);
        $mock->setDeleted($dbMock[0]['deleted']);

        $headers = new Header();
        $headers->setHeaderKey($dbMock[0]['headerKey']);
        $headers->setHeaderValue($dbMock[0]['headerValue']);
        $mock->addHeader($headers);

        return $mock;
    }

    public function saveMock(Mock $mock)
    {
        $this->getEntityManager()->persist($mock);
        $this->getEntityManager()->flush();
    }
}