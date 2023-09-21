<?php
namespace App\Controller\LanguageReference\PredefinedVariables;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SuperGlobalsController extends AbstractController
{
    #[Route('/predefined-variables/super-globals', name: 'superglobals')]
    public function index(Request $request)
    {
        dd(PHP_SAPI);
        dd($_COOKIE);
        dd($_ENV);
        session_start();
        dd($_SESSION);
        session_destroy();
        dd($_REQUEST);
        dd($_GET);
        dd($_SERVER);
        dd($GLOBALS);
    }
}