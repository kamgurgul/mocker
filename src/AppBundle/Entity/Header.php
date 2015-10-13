<?php
/**
 * Created by PhpStorm.
 * User: kgurgul
 * Date: 2015-10-12
 * Time: 21:07
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="header")
 */
class Header
{
    /**
     * @ORM\Column(type="integer", name="headerId")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $key;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $value;

    /**
     * @ORM\Column(type="integer")
     */
    protected $mockId;

    /**
     * @ORM\ManyToOne(targetEntity="Mock", inversedBy="headers")
     * @ORM\JoinColumn(name="mockId", referencedColumnName="mockId")
     **/
    protected $mock;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set key
     *
     * @param string $key
     *
     * @return Header
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return Header
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get mockId
     *
     * @return integer
     */
    public function getMockId()
    {
        return $this->mockId;
    }

    /**
     * Set mockId
     *
     * @param integer $mockId
     *
     * @return Header
     */
    public function setMockId($mockId)
    {
        $this->mockId = $mockId;

        return $this;
    }

    /**
     * Get mock
     *
     * @return \AppBundle\Entity\Mock
     */
    public function getMock()
    {
        return $this->mock;
    }

    /**
     * Set mock
     *
     * @param \AppBundle\Entity\Mock $mock
     *
     * @return Header
     */
    public function setMock(\AppBundle\Entity\Mock $mock = null)
    {
        $this->mock = $mock;

        return $this;
    }
}
