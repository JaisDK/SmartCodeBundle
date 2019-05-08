<?php

namespace Intracto\SmartCodeBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Intracto\SmartCodeBundle\Entity\PayloadInterface;
use Intracto\SmartCodeBundle\Entity\SmartCodeInterface;

trait SubjectTrait
{
    /**
     * @ORM\ManyToMany(targetEntity="Intracto\SmartCodeBundle\Entity\SmartCodeInterface", inversedBy="subjects")
     * @ORM\JoinTable(name="user_smartcode",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="smartcode_id", referencedColumnName="id")}
     *      )
     *
     * @var Collection|SmartCodeInterface[]
     */
    protected $smartCodes;

    /**
     * Has SmartCode.
     *
     * @param SmartCodeInterface $smartCode
     *
     * @return bool
     */
    public function hasSmartCode(SmartCodeInterface $smartCode)
    {
        return $this->smartCodes->contains($smartCode);
    }

    /**
     * Has SmartCode for given payload.
     *
     * @param PayloadInterface $payload
     *
     * @return bool
     */
    public function hasSmartCodeForPayload(PayloadInterface $payload)
    {
        return $this->smartCodes->contains($payload->getSmartCodes());
    }

    /**
     * Add SmartCode.
     *
     * @param SmartCodeInterface $smartCode
     *
     * @return self
     */
    public function addSmartCode(SmartCodeInterface $smartCode)
    {
        $this->smartCodes->add($smartCode);
        return $this;
    }

    /**
     * Remove SmartCode.
     *
     * @param SmartCodeInterface $smartCode
     *
     * @return self
     */
    public function removeSmartCode(SmartCodeInterface $smartCode)
    {
        $this->smartCodes->remove($smartCode);
        return $this;
    }

    /**
     * Get SmartCodes.
     *
     * @return Collection|SmartCodeInterface[]
     */
    public function getSmartCodes()
    {
        return $this->smartCodes;
    }
}
