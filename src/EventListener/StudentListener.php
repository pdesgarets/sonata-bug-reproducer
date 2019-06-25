<?php


namespace App\EventListener;


use App\Entity\Student;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\EntityManagerInterface;

class StudentListener implements EventSubscriber
{

    /** @var EntityManagerInterface */
    private $entityManager;

    /**
     * StudentListener constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $entityManager->getRepository(Student::class);
    }

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return string[]
     */
    public function getSubscribedEvents()
    {
        return [];
    }
}
