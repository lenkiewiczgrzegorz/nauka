<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\TestManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{

    private $testManager;

    public function __construct(TestManager $testManager)
    {
        $this->testManager = $testManager;
    }
    /**
     * @Route("/test", name="test_list")
     */
    public function test(): Response
    {
        $tests = $this->testManager->getAllTests();
        dump($tests);
        return $this->render('test/test.html.twig', [
            'tests' => $tests,
        ]);
    }
    /**
     * @Route("/newTest", name="test_new")
     */
    public function newTest(): Response
    {
        $test = 'HomePage';
        return $this->render('test/newTest.html.twig', [
            'tests' => $test,
        ]);
    }
    /**
     * @Route("/addTest", name="test_add", methods={"POST"})
     */
    public function addTest(Request $request): Response
    {
        $field0 = $request->request->get('field0');
        $field2 = $request->request->get('field2');

        $newTest = $this->testManager->addTest($field0, $field2);
        $tests = $this->testManager->getAllTests();
        dump($newTest);
        return $this->render('test/test.html.twig', [
            'newTest' => $newTest,
            'tests' => $tests,
        ]);
    }
}