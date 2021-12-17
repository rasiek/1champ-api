<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;



/**
 * @ApiResource(
 *  normalizationContext={"groups"={"test:read"}},
 *  collectionOperations= {
 *      "get",
 *      "post" = {
 *          "security" = "is_granted('ROLE_USER')"
 *      }
 *  }
 *      
 * )
 * @ORM\Entity(repositoryClass=TestRepository::class)
 */
class Test
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"test:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"test:read"})
     * @Groups({"test:write"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"test:read"})
     * @Groups({"test:write"})
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"test:write"})
     * @Groups({"test:read"})
     */
    private $age;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Groups({"test:read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     * @Groups({"test:write"})
     * 
     */
    private $personalQuestion;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function gerCreatedAtAgo(): string
    {
        return Carbon::instance($this->getCreatedAt())->diffForHumans();
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPersonalQuestion(): ?string
    {
        return $this->personal_question;
    }

    public function setPersonalQuestion(?string $personal_question): self
    {
        $this->personal_question = $personal_question;

        return $this;
    }
}
