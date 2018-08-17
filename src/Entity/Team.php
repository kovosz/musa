<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 */
class Team
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ReleaseTrain", inversedBy="teams")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Assert\NotBlank()
     */
    private $release_train;

    /**
     * @ORM\Column(type="string", length=32)
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 3,
     *      max = 32,
     *      minMessage = "Team name must be at least {{ limit }} characters long",
     *      maxMessage = "Team name cannot be longer than {{ limit }} characters"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="smallint")
     *
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min = 1,
     *      minMessage = "A team must have at least {{ limit }} member"
     * )
     */
    private $size;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return ReleaseTrain|null
     */
    public function getReleaseTrain(): ?ReleaseTrain
    {
        return $this->release_train;
    }

    /**
     * @param ReleaseTrain|null $release_train
     * @return Team
     */
    public function setReleaseTrain(?ReleaseTrain $release_train): self
    {
        $this->release_train = $release_train;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Team
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return Team
     */
    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }
}
