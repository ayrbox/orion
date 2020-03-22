<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReserveBloodStatusRepository")
 */
class ReserveBloodStatus
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BloodTypes", inversedBy="blood_types")
     * @ORM\JoinColumn(name="blood_type_id", referencedColumnName="id", nullable=false)
     */
    private $bloodType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reserves", inversedBy="reserves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Reserve;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getBloodType(): ?BloodTypes
    {
        return $this->bloodType;
    }

    public function setBloodType(?BloodTypes $bloodType): self
    {
        $this->bloodType = $bloodType;

        return $this;
    }

    public function getReserve(): ?Reserves
    {
        return $this->Reserve;
    }

    public function setReserve(?Reserves $Reserve): self
    {
        $this->Reserve = $Reserve;

        return $this;
    }
}
