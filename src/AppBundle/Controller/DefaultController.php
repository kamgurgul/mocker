<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Mock;
use AppBundle\Form\Type\MockType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // just setup a fresh $task object (remove the dummy data)
        $task = new Mock();
        $form = $this->createForm(new MockType(), $task);
        /* $form = $this->createFormBuilder($task)
             ->add('task', 'text')
             ->add('dueDate', 'date')
             ->add('save', 'submit', array('label' => 'Create Task'))
             ->getForm();*/

        $form->handleRequest($request);

        if ($form->isValid()) {
            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('task_success');
        }

        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
