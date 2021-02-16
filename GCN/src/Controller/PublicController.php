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
     * @Route("/Panier", name="panier")
     */
    public function panier()
    {
        return $this->render('public/panier.html.twig');
    }
}
