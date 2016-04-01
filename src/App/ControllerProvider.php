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
            ->get('/doctrine', [$this, 'doctrine'])
            ->bind('doctrine');

        $controllers
            ->match('/form', [$this, 'form'])
            ->bind('form');

        $controllers
            ->get('/cache', [$this, 'cache'])
            ->bind('cache');

        return $controllers;
    }

    public function homepage(App $app)
    {
        /*$app['session']->getFlashBag()->add('warning', 'Warning flash message');
        $app['session']->getFlashBag()->add('info', 'Info flash message');
        $app['session']->getFlashBag()->add('success', 'Success flash message');
        $app['session']->getFlashBag()->add('danger', 'Danger flash message');*/

        return $app['twig']->render('index.html.twig');
    }
	

    public function login(App $app)
    {
		 /*if ($request->isMethod('POST')) {
			var_dump("burda");	die(); 
		 }*/
		
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
            /*->add(
                $builder->create('Ticket-Form', 'form')
                    ->add('subformemail1', 'email', array(
                        'constraints' => array(new Assert\NotBlank(), new Assert\Email()),
                        'attr' => array('placeholder' => 'email constraints'),
                        'label' => 'A custom label : ',
                    ))
                    ->add('subformtext1', 'text')
            		)
            ->add('text1', 'text', array(
                'constraints' => new Assert\NotBlank(),
                'attr' => array('placeholder' => 'not blank constraints'),
            ))*/
            ->add('category', 'choice', array(
                'choices' => $category,
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('subject', 'text', array('attr' => array('class' => 'span1', 'placeholder' => 'Subject')))
            ->add('content', 'text', array('attr' => array('class' => 'span1', 'placeholder' => 'Content')))
            ->add('level', 'text', array('attr' => array('class' => 'span2', 'placeholder' => 'Level')))
            ->add('file', 'file')
			/*->add('text4', 'text', array('attr' => array('class' => 'span3', 'placeholder' => '.span3')))
            ->add('text5', 'text', array('attr' => array('class' => 'span4', 'placeholder' => '.span4')))
            ->add('text6', 'text', array('attr' => array('class' => 'span5', 'placeholder' => '.span5')))
            ->add('text8', 'text', array('disabled' => true, 'attr' => array('placeholder' => 'disabled field')))
            ->add('textarea', 'textarea')
            ->add('email', 'email')
            ->add('integer', 'integer')
            ->add('money', 'money')
            ->add('number', 'number')
            ->add('password', 'password')
            ->add('percent', 'percent')
            ->add('search', 'search')
            ->add('url', 'url')
            ->add('choice1', 'choice', array(
                'choices' => $choices,
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('choice2', 'choice', array(
                'choices' => $choices,
                'multiple' => false,
                'expanded' => true,
            ))
            ->add('choice3', 'choice', array(
                'choices' => $choices,
                'multiple' => true,
                'expanded' => false,
            ))
            ->add('choice4', 'choice', array(
                'choices' => $choices,
                'multiple' => false,
                'expanded' => false,
            ))
            ->add('country', 'country')
            ->add('language', 'language')
            ->add('locale', 'locale')
            ->add('timezone', 'timezone')
            ->add('date', 'date')
            ->add('datetime', 'datetime')
            ->add('time', 'time')
            ->add('birthday', 'birthday')
            ->add('checkbox', 'checkbox')
            ->add('radio', 'radio')
            ->add('password_repeated', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'The password fields must match.',
                'options' => array('required' => true),
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))*/
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
					//$app['db']->insert('form', array('subformemail1	' => $form["subformtext1"]->getData(), 'subformtext1' => $form["subformtext1"]->getData(), 'text1' => $form["subformtext1"]->getData()));
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
        ));
    }

    public function cache(App $app)
    {
        $response = new Response($app['twig']->render('cache.html.twig', array('date' => date('Y-M-d h:i:s'))));
        $response->setTtl(10);

        return $response;
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
