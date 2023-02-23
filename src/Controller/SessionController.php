<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    public function index(Request $request): Response
    {
        // session_start();
        $session = $request->getSession();
        if($session->has('nbVisit')){
            $nbVisit = $session->get('nbVisit') +1;
        }
        else {
            $nbVisit = 1;
        }
        $session->set('nbVisit', $nbVisit);
        return $this->render('session/index.html.twig');
    }
}
