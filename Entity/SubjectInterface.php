<?php

namespace Intracto\SmartCodeBundle\Entity;

use Doctrine\Common\Collections\Collection;

interface SubjectInterface
{
    /**
     * Has SmartCode.
     *
     * @param SmartCodeInterface $smartCode
     *
     * @return bool
     */
    public function hasSmartCode(SmartCodeInterface $smartCode);

    /**
     * Has SmartCode for given payload.
     *
     * @param PayloadInterface $payload
     *
     * @return bool
     */
    public function hasSmartCodeForPayload(PayloadInterface $payload);

    /**
     * Add SmartCode.
     *
     * @param SmartCodeInterface $smartCode
     *
     * @return self
     */
    public function addSmartCode(SmartCodeInterface $smartCode);

    /**
     * Add SmartCodes.
     *
     * @param SmartCodeInterface[] $smartCodes
     */
    public function addSmartCodes(array $smartCodes);

    /**
     * Remove SmartCode.
     *
     * @param SmartCodeInterface $smartCode
     *
     * @return self
     */
    public function removeSmartCode(SmartCodeInterface $smartCode);

    /**
     * Get SmartCodes.
     *
     * @return Collection|SmartCodeInterface[]
     */
    public function getSmartCodes();
}
