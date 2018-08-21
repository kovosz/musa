<?php

namespace App\Entity\Assessment;

use App\Entity\Answer;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=1023)
     */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Assessment\Group", inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $question_group;

    /**
     * @ORM\Column(type="smallint")
     */
    private $previous;

    /**
     * @ORM\Column(type="smallint")
     */
    private $next;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Assessment\Answer", mappedBy="question", orphanRemoval=true)
     */
    private $answers;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param int $version
     * @return Question
     */
    public function setVersion(int $version): self
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getQuestionGroup(): ?Group
    {
        return $this->question_group;
    }

    public function setQuestionGroup(?Group $question_group): self
    {
        $this->question_group = $question_group;

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
     * @return Collection|Answer[]
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
            $answer->setQuestion($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->contains($answer)) {
            $this->answers->removeElement($answer);
            // set the owning side to null (unless already changed)
            if ($answer->getQuestion() === $this) {
                $answer->setQuestion(null);
            }
        }

        return $this;
    }
}
