<?php
/**
 * Created by PhpStorm.
 * User: kgurgul
 * Date: 2015-10-19
 * Time: 18:26
 */

namespace AppBundle\Repository;

use AppBundle\Entity\Mock;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use Proxies\__CG__\AppBundle\Entity\Header;

class MockRepository extends EntityRepository
{
    public function getMockByUrl($mockUrl)
    {
        $result = $this->getEntityManager()->createQueryBuilder()
            ->select('
                mockId,
                user_id,
                url,
                method,
                response_status,
                body,
                created_at,
                blocked,
                deleted,
                headerId,
                header_key
                header_value
            ')
            ->from('Mock', 'm')
            ->leftJoin('Header', 'h', 'WITH', 'm.mockId = h.mockId')
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

    private function parseDBDataToObject(ArrayCollection $dbMock)
    {
        $mock = new Mock();
        $mock->setId($dbMock->get('mockId'));
        $mock->setUserId($dbMock->get('user_id'));
        $mock->setUrl($dbMock->get('url'));
        $mock->setMethod($dbMock->get('method'));
        $mock->setResponseStatus($dbMock->get('response_status'));
        $mock->setBody($dbMock->get('body'));
        $mock->setCreatedAt($dbMock->get('created_at'));
        $mock->setBlocked($dbMock->get('blocked'));
        $mock->setDeleted($dbMock->get('deleted'));

        $headers = new Header();
        $headers->setHeaderKey($dbMock->get('header_key'));
        $headers->setHeaderValue($dbMock->get('header_value'));
        $mock->addHeader($headers);

        return $mock;
    }

    public function saveMock(Mock $mock)
    {
        $this->getEntityManager()->persist($mock);
        $this->getEntityManager()->flush();
    }
}