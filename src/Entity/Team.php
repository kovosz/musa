<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.08.16.
 * Time: 20:00
 */

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Team
{
    /**
     * @Assert\NotBlank()
     *
     * @var string
     */
    protected $name;
    /**
     * @Assert\NotBlank()
     * @var string
     */
    protected $releaseTrain;
    /**
     * @Assert\NotBlank()
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @var int
     */
    protected $size;

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Team
     */
    public function setName(string $name): Team
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getReleaseTrain(): ?string
    {
        return $this->releaseTrain;
    }

    /**
     * @param string $releaseTrain
     * @return Team
     */
    public function setReleaseTrain(string $releaseTrain): Team
    {
        $this->releaseTrain = $releaseTrain;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return Team
     */
    public function setSize(int $size): Team
    {
        $this->size = $size;
        return $this;
    }

}