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
