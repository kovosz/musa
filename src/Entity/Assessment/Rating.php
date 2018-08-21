<?php

namespace App\Entity\Assessment;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RatingRepository")
 */
class Rating
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=31)
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $option_label;

    /**
     * @ORM\Column(type="smallint")
     */
    private $value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOptionLabel(): ?string
    {
        return $this->option_label;
    }

    /**
     * @param string $option_label
     * @return Rating
     */
    public function setOptionLabel(string $option_label): self
    {
        $this->option_label = $option_label;
        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }
}
