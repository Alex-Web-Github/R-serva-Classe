<?php

namespace App\Entity;

use App\Repository\SlotsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SlotsRepository::class)]
class Slots
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
  private ?\DateTimeImmutable $dateTime = null;

  #[ORM\Column(length: 255)]
  private ?string $available = 'yes';


  public function getId(): ?int
  {
    return $this->id;
  }

  public function getDateTime(): ?\DateTimeImmutable
  {
    return $this->dateTime;
  }

  public function setDateTime(\DateTimeImmutable $dateTime): static
  {
    $this->dateTime = $dateTime;

    return $this;
  }

  public function getAvailable(): ?string
  {
    return $this->available;
  }

  public function setAvailable(string $available): static
  {
    $this->available = $available;

    return $this;
  }


  public function getEndTime(): ?\DateTimeImmutable
  {
    return $this->dateTime->modify('+20 minutes');
  }
}
