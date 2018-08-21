<?php
// src/DataFixtures/ArtFixtures.php
namespace App\DataFixtures;

use App\Entity\Assessment\Rating;
use App\Entity\ReleaseTrain;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArtFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /**
         * Create release trains
         */
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

        /**
         * Add MUSA rating grades
         */
        $grades = [
            ['label' => 'Mostly 90', 'option_label' => 'M', 'value' => 34],
            ['label' => 'Usually (50%<)', 'option_label' => 'U', 'value' => 24],
            ['label' => 'Sometimes (0%<)', 'option_label' => 'S', 'value' => 13],
            ['label' => 'Absent (0%)', 'option_label' => 'A', 'value' => 0],
            ['label' => 'Not Applicable (N/A)', 'option_label' => 'N/A', 'value' => 0],
        ];

        foreach ($grades as $grade){
            $rating = new Rating();
            $rating->setLabel($grade['label']);
            $rating->setOptionLabel($grade['option_label']);
            $rating->setValue($grade['value']);
            $manager->persist($rating);
        }

        $manager->flush();
    }
}