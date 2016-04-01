<?php

namespace App;

use Silex\Application as App;
use Silex\ControllerProviderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;

class ControllerProvider implements ControllerProviderInterface
{
    private $app;

    public function connect(App $app)
    {
        $this->app = $app;

        $app->error([$this, 'error']);

        $controllers = $app['controllers_factory'];
		
        $controllers
            ->get('/', [$this, 'homepage'])
            ->bind('homepage');

        $controllers
            ->get('/login', [$this, 'login'])
            ->bind('login');
      	
        $controllers
            ->match('/form', [$this, 'form'])
            ->bind('form');


        return $controllers;
    }

    public function homepage(App $app)
    {
        return $app['twig']->render('index.html.twig');
    }
	

    public function login(App $app)
    {
		  return $app['twig']->render('login.html.twig', array(
				'error' => $app['security.utils']->getLastAuthenticationError(),
				'username' => $app['security.utils']->getLastUsername(),
			));		
			
			
	}

    public function doctrine(App $app)
    {
        return $app['twig']->render('doctrine.html.twig', array(
            'posts' => $app['db']->fetchAll('SELECT * FROM post'),
        ));
    }

    public function form(App $app, Request $request)
    {
        $builder = $app['form.factory']->createBuilder('form');

        $choices = array('choice a', 'choice b', 'choice c');
		$category = array('Bilgi işlem', 'Kurumsal İletişim', 'İnsan Kaynakları');

        $form = $builder
            ->add('category', 'choice', array(
                'choices' => $category,
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('subject', 'text', array('attr' => array('class' => 'span1', 'placeholder' => 'Subject')))
            ->add('content', 'text', array('attr' => array('class' => 'span1', 'placeholder' => 'Content')))
            ->add('level', 'text', array('attr' => array('class' => 'span2', 'placeholder' => 'Level')))
            ->add('file', 'file')
            ->add('submit', 'submit')
            ->getForm();
			
		
		$values = array();
		$request = $app['request']; 
        
		if ($form->handleRequest($request)->isSubmitted()) {
            if ($form->isValid()) {
				if ($request->isMethod('POST')) {
					$files = $request->files->get($form->getName());
					//$path = __DIR__.'/../web/upload/';
					//$filename = $files['file']->getClientOriginalName();
					//$files['FileUpload']->move($path,$filename);
					//var_dump($filename);die();
					$values = $request->request->all();
					$app['db']->insert('forms_ticket', array(
						'user_id' => 1, 
						'subject' => $values["form"]["subject"], 
						'content' => $values["form"]["content"], 
						'level' => $values["form"]["level"],
						'file' => 1,
						'created_at	' => date("Y-m-d H:i:s"),
						)
					);
				}
				
                $app['session']->getFlashBag()->add('success', 'The form is valid');
            } else {
                $form->addError(new FormError('This is a global error'));
                $app['session']->getFlashBag()->add('info', 'The form is bound, but not valid');
            }
        }

        return $app['twig']->render('form.html.twig', array(
            'form' => $form->createView(),
			//'liste' => $app['db']->fetchAll('SELECT * FROM forms_ticket'),
        ));
    }


    public function error(\Exception $e, $code)
    {
        if ($this->app['debug']) {
            return;
        }

        switch ($code) {
            case 404:
                $message = 'The requested page could not be found.';
                break;
            default:
                $message = 'We are sorry, but something went terribly wrong.';
        }

        return new Response($message, $code);
    }
}
