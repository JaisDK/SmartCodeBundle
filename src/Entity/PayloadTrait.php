<?php

namespace Intracto\SmartCodeBundle\Entity;

use Doctrine\Common\Collections\Collection;

trait PayloadTrait
{
    /**
     * @ORM\OneToMany(targetEntity="Intracto\SmartCodeBundle\Entity\SmartCodeInterface", mappedBy="payload")
     *
     * @var Collection|SmartCodeInterface[]
     */
    protected $smartCodes;

    /**
     * @return Collection|SmartCodeInterface[]
     */
    public function getSmartCodes()
    {
        return $this->smartCodes;
    }

    /**
     * @param SmartCodeInterface $smartCode
     *
     * @return bool
     */
    public function hasSmartCode(SmartCodeInterface $smartCode)
    {
        return $this->hasSmartCodes() && $this->smartCodes->contains($smartCode);
    }

    /**
     * @return bool
     */
    public function hasSmartCodes()
    {
        return null !== $this->smartCodes;
    }

    /**
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
     * @param SmartCodeInterface $smartCode
     *
     * @return self
     */
    public function removeSmartCode(SmartCodeInterface $smartCode)
    {
        $this->smartCodes->remove($smartCode);
        return $this;
    }
}
