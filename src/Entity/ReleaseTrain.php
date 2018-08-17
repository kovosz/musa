<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReleaseTrainRepository")
 */
class ReleaseTrain
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $name;

    /**
     * @ORM\Column(type="smallint", options={"unsigned"=true})
     */
    private $number;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Team", mappedBy="release_train", orphanRemoval=true)
     */
    private $teams;

    /**
     * ReleaseTrain constructor.
     */
    public function __construct()
    {
        $this->teams = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
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
     * @return ReleaseTrain
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return ReleaseTrain
     */
    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    /**
     * @param Team $team
     * @return ReleaseTrain
     */
    public function addTeam(Team $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams[] = $team;
            $team->setReleaseTrain($this);
        }

        return $this;
    }

    /**
     * @param Team $team
     * @return ReleaseTrain
     */
    public function removeTeam(Team $team): self
    {
        if ($this->teams->contains($team)) {
            $this->teams->removeElement($team);
            // set the owning side to null (unless already changed)
            if ($team->getReleaseTrain() === $this) {
                $team->setReleaseTrain(null);
            }
        }

        return $this;
    }
}
