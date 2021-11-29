<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SingleMatchRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=SingleMatchRepository::class)
 */
class SingleMatch
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="singleMatches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $teamA;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="singleMatches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $teamB;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $resultTeamA;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $resultTeamB;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeamA(): ?Team
    {
        return $this->teamA;
    }

    public function setTeamA(?Team $teamA): self
    {
        $this->teamA = $teamA;

        return $this;
    }

    public function getTeamB(): ?Team
    {
        return $this->teamB;
    }

    public function setTeamB(?Team $teamB): self
    {
        $this->teamB = $teamB;

        return $this;
    }

    public function getResultTeamA(): ?string
    {
        return $this->resultTeamA;
    }

    public function setResultTeamA(?string $resultTeamA): self
    {
        $this->resultTeamA = $resultTeamA;

        return $this;
    }

    public function getResultTeamB(): ?string
    {
        return $this->resultTeamB;
    }

    public function setResultTeamB(?string $resultTeamB): self
    {
        $this->resultTeamB = $resultTeamB;

        return $this;
    }
}
