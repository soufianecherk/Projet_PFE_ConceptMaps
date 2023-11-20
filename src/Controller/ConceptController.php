<?php

namespace App\Controller;

use App\Entity\Map;
use App\Entity\SharedMap;
use App\Form\FormMapType;
use App\Form\ShareMapType;
use App\Form\UpdateMapType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\MapRepository;
use App\Repository\SharedMapRepository;
use App\Repository\UserRepository;
use DateTime;
use PhpParser\Builder\Method;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConceptController extends AbstractController
{
    private $em;
    private $mapRepository;
    private $SharedMapRepository;
    public function __construct(MapRepository $mapRepository, EntityManagerInterface $em, SharedMapRepository $SharedMapRepository)
    {
        $this->SharedMapRepository = $SharedMapRepository;
        $this->mapRepository = $mapRepository;
        $this->em = $em;
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('concept/index.html.twig', [
            'controller_name' => 'ConceptController',
        ]);
    }
    #[Route('/concepts', name: 'concepts')]
    public function concept(MapRepository $MapRepository, SharedMapRepository $sharedMapRepository)
    {
        return $this->render('concept/concepts.html.twig', [
            'Map' => $MapRepository->findBy([]),
            'SharedMap' => $sharedMapRepository->findBy([])
        ]);
    }

    #[Route('/share/{id}', methods: ['GET', 'POST'], name: 'share_concept')]
    public function share($id, MapRepository $MapRepository, Request $request)
    {

        $map = new SharedMap();
        $form = $this->createForm(ShareMapType::class, $map);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $map = $form->getData();
            $map->setMap($MapRepository->find($map->getMapLabel()));
            $this->em->persist($map);
            $this->em->flush();
            return $this->redirect('/concepts');
        }

        return $this->render('concept/share.html.twig', [

            'Map' => $MapRepository->find($id),
            'form' => $form->createView()
        ]);
    }


    #[Route('/new/concept', name: 'new_concept',)]
    public function NewConcept(Request $request, UserRepository $user)
    {

        $map = new Map();
        $form = $this->createForm(FormMapType::class, $map);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $map = $form->getData();
            $time = new DateTime('now');
            $time->getTimestamp();
            $map->setOwner($user->find($map->getOwnerLabel()));
            $map->setLastModified($time);

            $this->em->persist($map);
            $this->em->flush();
            return $this->redirect('/concepts');
        }
        return $this->render('concept/new.html.twig', [
            'FormMap' => $form->createView()

        ]);
    }
    #[Route('/concepts/{id}', methods: ['GET', 'POST'], name: 'concept_show')]
    public function show($id, MapRepository $MapRepository, Request $request, UserRepository $user)
    {
        $map = $this->mapRepository->find($id);
        $form = $this->createForm(UpdateMapType::class, $map);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $time = new DateTime('now');
            $time->getTimestamp();
            $map->setLastModified($time);
            $map->setJson($form->get('json')->getData());
            $map->setTitle($form->get('title')->getData());

            $this->em->flush();
            return $this->redirect('/concepts');
        }

        return $this->render('concept/update.html.twig', [

            'Map' => $MapRepository->find($id),
            'form' => $form->createView()
        ]);
    }
    #[Route('/concepts/shared/{id}', methods: ['GET', 'POST'], name: 'shared_show')]
    public function shared($id, SharedMapRepository $sharedMapRepository, Request $request)
    {
        $Smap = $this->SharedMapRepository->find($id);
        $map = $Smap->getMap();
        $form = $this->createForm(UpdateMapType::class, $map);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $time = new DateTime('now');
            $time->getTimestamp();
            $map->setLastModified($time);
            $map->setJson($form->get('json')->getData());
            $map->setTitle($form->get('title')->getData());
            $this->em->flush();
            return $this->redirect('/concepts');
        }

        return $this->render('concept/show.html.twig', [

            'sharedMap' => $sharedMapRepository->find($id),
            'form' => $form->createView()
        ]);
    }
}
