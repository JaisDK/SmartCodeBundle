<?php

namespace Intracto\SmartCodeBundle\Action;

use Doctrine\ORM\EntityManagerInterface;
use Intracto\SmartCodeBundle\Entity\SmartCodeInterface;
use Intracto\SmartCodeBundle\Entity\SubjectInterface;
use Intracto\SmartCodeBundle\Exception\InvalidSmartCodeException;

class SmartCodeAction implements SmartCodeActionInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    /**
     * {@inheritdoc}
     */
    public function register(SubjectInterface $subject, SmartCodeInterface $smartCode)
    {
        if (!$smartCode->isValid()) {
            throw new InvalidSmartCodeException('The smart code provided is not valid');
        }

        $subject->addSmartCode($smartCode);
        $smartCode->incrementUsed();

        $this->manager->persist($subject);
        $this->manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function unregister(SubjectInterface $subject, SmartCodeInterface $smartCode)
    {
        $subject->removeSmartCode($smartCode);
        $smartCode->setUsed($smartCode->getUsed() - 1);

        $this->manager->persist($subject);
        $this->manager->flush();
    }
}
