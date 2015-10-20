<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Header;
use AppBundle\Entity\Mock;
use AppBundle\Form\Type\MockType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // Fix to show first clear header inputs
        $mock = new Mock();
        $header = new Header();
        $mock->addHeader($header);
        $header->setMock($mock);

        $form = $this->createForm(new MockType(), $mock);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $mockService = $this->get('mock_service');
            $mockService->generateMockUrl($mock);

            return $this->redirectToRoute('task_success');
        }

        return $this->render('default/main.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/{mockUrl}", name="mock")
     */
    public function mockAction($mockUrl)
    {
        $mockService = $this->get('mock_service');
        $mock = $mockService->getMock($mockUrl);

        return $this->render($mock->getBody());
    }
}
