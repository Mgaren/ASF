<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

class UtilsService
{
    private EntityManagerInterface $entityManager;

    /**
     * Service constructor.
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @param $entities
     *
     * @return array
     */
    public function getHistoriesByDate($entities): array
    {
        $historiesByDate = [];
        foreach ($entities as $history) {
          $date = $history->getDate()->getDate();
          $historiesByDate[$date][] = $history;
        }

        return $historiesByDate;
    }

}
