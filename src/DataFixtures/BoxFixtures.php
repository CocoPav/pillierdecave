<?php

namespace App\DataFixtures;

use App\Entity\Box;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class BoxFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
     
        $decouverte = new Box();
        $decouverte->setTitle("découverte");
        $decouverte->setDescription("Ceci est une description");
        $decouverte->setImage("box1.jpg");
        $decouverte->setPrice(12);
        $manager->persist($decouverte);
        $this->addReference("box-découverte", $decouverte);

       
        $surmesure = new Box();
        $surmesure->setTitle("surmesure");
        $surmesure->setDescription("Ceci est une description");
        $surmesure->setImage("box2.jpg");
        $surmesure->setPrice(2);
        $manager->persist($surmesure);
        $this->addReference("box-surmesure", $surmesure);

       
        $surprise = new Box();
        $surprise->setTitle("surprise");
        $surprise->setDescription("Ceci est une description");
        $surprise->setImage("box3.jpg");
        $surprise->setPrice(14);
        $manager->persist($surprise);
        $this->addReference("box-surprise", $surprise);

       


        $manager->flush();
    }
}
