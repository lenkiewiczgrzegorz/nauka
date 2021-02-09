<?php

namespace App\Service;

use App\Entity\Test;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Expr\Cast\Object_;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Config\Definition\Exception\Exception;


class TestManager
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getAllTests(): array
    {
        return $this->em->getRepository(Test::class)
            ->findAll();
    }

    public function getTest(int $id): object
    {
        try
        {

            return $this->em->getRepository(Test::class)
                ->find($id);
        }
        catch (Exception $ex)
        {
            throw new Exception('Brak obiektu o id = ' . $id);
        }
    }

    public function addTest(string $field0, int $field2)
    {
        $test = new Test();
        $test->setField0($field0);
        $test->setField2($field2);

        $this->em->persist($test);
        $this->em->flush();

        return $this->getTest($test->getId());
    }

    public function  removeTest(int $id): int
    {
        $this->em->remove($this->getTest($id));
    }
}