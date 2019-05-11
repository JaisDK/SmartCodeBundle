<?php

namespace Intracto\SmartCodeBundle\Entity;

use Doctrine\Common\Collections\Collection;

trait SubjectTrait
{
    /**
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
     * Add SmartCodes.
     *
     * @param SmartCodeInterface[] $smartCodes
     */
    public function addSmartCodes(array $smartCodes)
    {
        foreach ($smartCodes as $smartCode) {
            $this->addSmartCode($smartCode);
        }
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
