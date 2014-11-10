<?php

namespace Scheme;

class SchemeKernel extends Kernel
{
    public function getRoutes()
    {
        return array(
            ['GET', '/', 'Scheme\Controller\LanguageController:getLanguageOrigin'],
            ['GET', '/{leng}/', 'Scheme\Controller\LanguageController:getLanguage'],
        );
    }
    public function getTemplateHandler()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../app/views');
        $twig = new \Twig_Environment($loader);
        return $twig;
    }
}