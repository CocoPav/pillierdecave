<?php

namespace App\DataFixtures;

use App\Entity\Box;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class BoxFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
     
        $découverte = new Box();
        $découverte->setTitle("découverte");
        $découverte->setDescription("Ceci est une description");
        $découverte->setImage("box1.jpg");
        $découverte->setPrice(12);
        $découverte->persist($découverte);
        $this->addReference("box-découverte", $découverte);

       
        $surmesure = new Box();
        $surmesure->setTitle("surmesure");
        $surmesure->setDescription("Ceci est une description");
        $surmesure->setImage("box2.jpg");
        $surmesure->setPrice(2);
        $surmesure->persist($surmesure);
        $this->addReference("box-surmesure", $surmesure);

       
        $surprise = new Box();
        $surprise->setTitle("surprise");
        $surprise->setDescription("Ceci est une description");
        $surprise->setImage("box3.jpg");
        $surprise->setPrice(14);
        $surprise->persist($surprise);
        $this->addReference("box-surprise", $surprise);

       


        $manager->flush();
    }
}
