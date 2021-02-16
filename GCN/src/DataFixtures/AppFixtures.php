<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 10; $i++) {
            $product = new Product();
            $product->setName("nom du produit n'$i")
                ->setPicture("https://source.unsplash.com/random/350x150")
                ->setDescription("Description du produit n'$i")
                ->setCreated(new \DateTime());
            if ($i < 5) {
                $product->setPromo(true);
            } else {
                $product->setPromo(false);
            }
            $manager->persist($product);
        }



        $manager->flush();
    }
}
