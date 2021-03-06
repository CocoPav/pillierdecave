<?php

namespace App\DataFixtures;

use App\Entity\Alcohol;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AlcoholFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $glenlivet = new Alcohol();
        $glenlivet->setName("GlenLivet");
        $glenlivet->setCategory($this->getReference("cat-whisky"));
        $manager->persist($glenlivet);


        $moet = new Alcohol();
        $moet->setName("Moët");
        $moet->setCategory($this->getReference("cat-champagne"));
        $manager->persist($moet);

        $manager->flush();


        $chouffe = new Alcohol();
        $chouffe->setName("Chouffe");
        $chouffe->setCategory($this->getReference("cat-biere"));
        $manager->persist($chouffe);

        $manager->flush();

        $villageoise = new Alcohol();
        $villageoise ->setName("Villageoise");
        $villageoise ->setCategory($this->getReference("cat-vin"));
        $manager->persist($villageoise );

        $fourflower = new Alcohol();
        $fourflower->setName("FourFlower");
        $fourflower->setCategory($this->getReference("cat-whisky"));
        $manager->persist($fourflower);


        $ruinard = new Alcohol();
        $ruinard ->setName("Ruinard");
        $ruinard ->setCategory($this->getReference("cat-champagne"));
        $manager->persist($ruinard);

        $manager->flush();


        $leffe = new Alcohol();
        $leffe->setName("Leffe");
        $leffe->setCategory($this->getReference("cat-biere"));
        $manager->persist($leffe);

        $manager->flush();

        $chateaumargaux = new Alcohol();
        $chateaumargaux ->setName("Chateauneuf Margaux");
        $chateaumargaux ->setCategory($this->getReference("cat-vin"));
        $manager->persist($chateaumargaux );

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            CategoryFixtures::class
        ];
    }
}
