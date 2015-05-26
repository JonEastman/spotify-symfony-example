<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class SpotifyController extends Controller
{
    /**
     * @Route("/", name="home_page")
     */
    public function homeAction(Request $request)
    {

        $form = $this->createForm(new SearchType());

        $form->handleRequest($request);

        if ($form->isValid()) {

            $data = $form->getData();

            $searchText = $data['searchText'];

            var_dump($searchText); die;

        }

        return $this->render('default/home_page.html.twig', array(
            'form'      => $form->createView()
        ));
    }
}
