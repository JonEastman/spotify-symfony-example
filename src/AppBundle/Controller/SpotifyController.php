<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Album;
use AppBundle\Form\Type\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class SpotifyController extends Controller
{
    /**
     * Search Page (Home Page)
     *
     * @Route("/", name="home_page")
     */
    public function homeAction(Request $request)
    {
        $albums = null;

        $form = $this->createForm(new SearchType());

        $form->handleRequest($request);

        if ($form->isValid()) {

            $data = $form->getData();

            $searchText = $data['searchText'];

            //Get search results
            $albums = $this->get('album_manager')->search($searchText);

            //Normally you would redirect the user to a new page...
            // return $this->redirectToRoute('search_results', array('results' => $results));
        }

        return $this->render('default/home_page.html.twig', array(
            'form'      => $form->createView(),
            'albums'    => $albums
        ));
    }

    /**
     * Display an Album
     *
     * @Route("/album/{id}", name="view_album", requirements={"id": "\d+"})
     */
    public function viewAlbumAction(Album $album)
    {

        $em = $this->getDoctrine()->getManager();

        if (!$album->getDownLoaded()) {

            //Save Tracks in Database
            $this->get('album_manager')->saveTracks($album);

            //Mark Album as tracks downloaded
            $album->setDownLoaded(true);

            $em->persist($album);
            $em->flush();
        }

        return $this->render('default/view_album.html.twig', array(
            'album'    => $album
        ));
    }

    /**
     * About Project
     *
     * @Route("/about", name="about")
     */
    public function aboutAction()
    {

        return $this->render('default/about.html.twig', array());
    }
}
