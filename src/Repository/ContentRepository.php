<?php
/**
 * ContentRepository.php
 * @author  Ariel Belloc <abelloc@qubit.tv>
 * @license Propietary
 */

namespace App\Repository;

use App\Entity\Content;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ContentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Content::class);
    }
}