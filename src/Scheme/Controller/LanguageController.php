<?php

namespace Scheme\Controller;

use Scheme\Model\Contact;
use Symfony\Component\HttpFoundation\Response;

class LanguageController extends AbstractController
{

    public function getLanguageOrigin()
    {
        return new Response($this->twig->render('index.html.twig', ['content' => Contact::findOne(array('language' => 'en'))]));
    }

    public function getLanguage($leng)
    {
        return new Response($this->twig->render('index.html.twig', ['content' => Contact::findOne(array('language' => $leng))]));
    }
}