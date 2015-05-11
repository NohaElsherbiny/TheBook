<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\TaskType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Author;
use AppBundle\Entity\Task;
use AppBundle\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/app/example", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
    /**
    *@Route("Author",name="author")
    */
    public function AuthorAction()
    {
    	$author = new Author();
		// ... do something to the $author object
		;
		$validator = $this->get('validator');
		$errors = $validator->validate($author);
		if (count($errors) > 0) {
			/*
			* Uses a __toString method on the $errors variable which is a
			* ConstraintViolationList object. This gives us a nice string
			* for debugging.
			*/
			$errorsString = (string) $errors;
			//return new Response($errorsString);
			return $this->render('author/validation.html.twig', array(
			'errors' => $errors,
			));
		}
	return new Response('The author is valid! Yes! end'.$author->getName().'end');
    }
    /**
    * @Route("Task",name="task")
    */
    public function newAction(Request $request)
	{
		// create a task and give it some dummy data for this example
		$task = new Task();
		//$form = $this->createForm(new TaskType(), $task);
		$form = $this->createForm('task',$task);
		$form->handleRequest($request);
			if ($form->isValid()) {
				// perform some action, such as saving the task to the database
				$em = $this->getDoctrine()->getManager();
				$em->persist($task);
				$em->flush();
				return $this->redirectToRoute('success');
			}
		return $this->render('default/new.html.twig', array(
			'form' => $form->createView(),
		));
	}
	/**
    * @Route("success",name="success")
    */
    public function successAction()
	{
		$em = $this->getDoctrine()->getManager();
		$products = $em->getRepository('AppBundle:Task')
						->findByDateOrdered();	
		//$em->persist($products);
		//$em->flush();
		
		return new Response('New task added successfully :D');
	}
}
