<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TeamRepository::class)
 */
class Team
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Tournoi::class, mappedBy="teams")
     */
    private $tournois;

    /**
     * @ORM\OneToMany(targetEntity=Player::class, mappedBy="team", orphanRemoval=true)
     */
    private $players;

    /**
     * @ORM\OneToMany(targetEntity=SingleMatch::class, mappedBy="teamA")
     */
    private $singleMatches;

    public function __construct()
    {
        $this->tournois = new ArrayCollection();
        $this->players = new ArrayCollection();
        $this->singleMatches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Tournoi[]
     */
    public function getTournois(): Collection
    {
        return $this->tournois;
    }

    public function addTournoi(Tournoi $tournoi): self
    {
        if (!$this->tournois->contains($tournoi)) {
            $this->tournois[] = $tournoi;
            $tournoi->addTeam($this);
        }

        return $this;
    }

    public function removeTournoi(Tournoi $tournoi): self
    {
        if ($this->tournois->removeElement($tournoi)) {
            $tournoi->removeTeam($this);
        }

        return $this;
    }

    /**
     * @return Collection|Player[]
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function addPlayer(Player $player): self
    {
        if (!$this->players->contains($player)) {
            $this->players[] = $player;
            $player->setTeam($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): self
    {
        if ($this->players->removeElement($player)) {
            // set the owning side to null (unless already changed)
            if ($player->getTeam() === $this) {
                $player->setTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SingleMatch[]
     */
    public function getSingleMatches(): Collection
    {
        return $this->singleMatches;
    }

    public function addSingleMatch(SingleMatch $singleMatch): self
    {
        if (!$this->singleMatches->contains($singleMatch)) {
            $this->singleMatches[] = $singleMatch;
            $singleMatch->setTeamA($this);
        }

        return $this;
    }

    public function removeSingleMatch(SingleMatch $singleMatch): self
    {
        if ($this->singleMatches->removeElement($singleMatch)) {
            // set the owning side to null (unless already changed)
            if ($singleMatch->getTeamA() === $this) {
                $singleMatch->setTeamA(null);
            }
        }

        return $this;
    }
}
