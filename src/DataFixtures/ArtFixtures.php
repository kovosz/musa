<?php
// src/DataFixtures/ArtFixtures.php
namespace App\DataFixtures;

use App\Entity\ReleaseTrain;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArtFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $arts = [
            ['name' => 'Content', 'number' => 1],
            ['name' => 'Update', 'number' => 2],
            ['name' => 'Embedded', 'number' => 3],
            ['name' => 'Hybrid', 'number' => 4],
            ['name' => 'Application', 'number' => 5]
        ];

        foreach ($arts as $art){
            $releaseTrain = new ReleaseTrain();
            $releaseTrain->setName($art['name']);
            $releaseTrain->setNumber($art['number']);
            $manager->persist($releaseTrain);
        }

        $manager->flush();
    }
}