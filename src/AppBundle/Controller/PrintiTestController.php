<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PrintiTestController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        /**
         * A way to include it directly as class object
         */
        //$client = new \Github\Client();

        /**
         * can also be included as  service by container by adding in service.yml
         */
        $client = $this->get('github_api');

        $repositories = $client->api('user')->repositories('symfony');

        return $this->render('printi_test/index.html.twig',[
            "repositories" => $repositories,
        ]);
    }
}
