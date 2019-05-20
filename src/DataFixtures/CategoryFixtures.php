<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $whisky = new Category();
        $whisky->setName("Whisky");
        $manager->persist($whisky);
        $this->addReference("cat-whisky", $whisky);

        $biere = new Category();
        $biere->setName("Bière");
        $manager->persist($biere);
        $this->addReference("cat-biere", $biere);

        $champagne = new Category();
        $champagne->setName("Champagne");
        $manager->persist($champagne);
        $this->addReference("cat-champagne", $champagne);

        $vin = new Category();
        $vin->setName("Vin");
        $manager->persist($vin);
        $this->addReference("cat-vin", $vin);

        $vodka = new Category();
        $vodka->setName("Vodka");
        $manager->persist($vodka);
        $this->addReference("cat-vodka", $vodka);



        $manager->flush();
    }
}
