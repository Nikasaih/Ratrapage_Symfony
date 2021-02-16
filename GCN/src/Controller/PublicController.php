<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Product;
use App\Form\ContactType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(ProductRepository $repo): Response
    {

        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
            'products' => $repo->findAll()
        ]);
    }

    /**
     * @Route("/Products", name="products_list")
     */
    public function products_list(ProductRepository $repo)
    {
        return $this->render('public/products_list.html.twig', [
            'products' => $repo->findAll()
        ]);
    }

    /**
     * @Route("/Products/{id}", name="product_fiche")
     */
    public function product_fiche($id, ProductRepository $repo)
    {
        return $this->render('public/product_fiche.html.twig', [
            'product' => $repo->find($id)
        ]);
    }

    /**
     * @Route("/Contact", name="contact")
     */
    public function contact(Request $request, EntityManagerInterface $manager)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact->setCreated(new \DateTime());

            $contact->setContactDate(new \DateTime());


            $manager->persist($contact);
            $manager->flush();

            return $this->redirectToRoute('accueil');
        }
        return $this->render('public/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/Panier/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session)
    {
        $panier = $session->get('panier', []);


        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }


        $session->set('panier', $panier);

        dd($session->get('panier'));
    }


    /**
     * @Route("/Panier", name="panier")
     */
    public function panier(SessionInterface $session, ProductRepository $repo)
    {
        $panier = $session->get('panier', []);

        $panierWithData = [];

        foreach ($panier as $id => $quantity) {
            $panierWithData[] = [
                'product' => $repo->find($id),
                'quantity' => $quantity
            ];
        }

        return $this->render('public/panier.html.twig', [
            'items' => $panierWithData
        ]);
    }

    /**
     * @Route("/Panier/remove/{id}", name="card_remove")
     */
    public function remove($id, SessionInterface $session)
    {
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute("panier");
    }
}
