<?php

namespace App\Entity\Assessment;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GroupRepository")
 */
class Group
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=511)
     */
    private $title;

    /**
     * @ORM\Column(type="smallint")
     */
    private $previous;

    /**
     * @ORM\Column(type="smallint")
     */
    private $next;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Assessment\Question", mappedBy="question_group")
     */
    private $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPrevious(): ?int
    {
        return $this->previous;
    }

    public function setPrevious(int $previous): self
    {
        $this->previous = $previous;

        return $this;
    }

    public function getNext(): ?int
    {
        return $this->next;
    }

    public function setNext(int $next): self
    {
        $this->next = $next;

        return $this;
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
            $question->setQuestionGroup($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->questions->contains($question)) {
            $this->questions->removeElement($question);
            // set the owning side to null (unless already changed)
            if ($question->getQuestionGroup() === $this) {
                $question->setQuestionGroup(null);
            }
        }

        return $this;
    }
}
