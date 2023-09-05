<?php

namespace App\Entity;

use App\Repository\TypeStageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeStageRepository::class)
 */
class TypeStage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stageOuvrier;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PFA;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PFE;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStageOuvrier(): ?int
    {
        return $this->stageOuvrier;
    }

    public function setStageOuvrier(?int $stageOuvrier): self
    {
        $this->stageOuvrier = $stageOuvrier;

        return $this;
    }

    public function getPFA(): ?int
    {
        return $this->PFA;
    }

    public function setPFA(?int $PFA): self
    {
        $this->PFA = $PFA;

        return $this;
    }

    public function getPFE(): ?int
    {
        return $this->PFE;
    }

    public function setPFE(?int $PFE): self
    {
        $this->PFE = $PFE;

        return $this;
    }
}
