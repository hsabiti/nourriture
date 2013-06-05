<?php

namespace Nourriture\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('NourritureFrontEndBundle:Default:index.html.twig', array('name' => $name));
    }
}
