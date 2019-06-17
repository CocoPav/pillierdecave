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
        $découverte->setName("découverte");
        $manager->persist($découverte);
        $this->addReference("box-découverte", $découverte);

        $surmesure = new Box();
        $surmesure->setName("surmesure");
        $surmesure->persist($surmesure);
        $this->addReference("box-surmesure", $surmesure);

        $surprise = new Box();
        $surprise ->setName("suxrprise ");
        $manager->persist($surprise );
        $this->addReference("box-surprise ", $surprise);

       


        $manager->flush();
    }
}
