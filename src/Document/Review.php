<?php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document(collection: "reviews")]
class Review
{
#[MongoDB\Id]
private ?string $id = null;

#[MongoDB\Field(type:"int")]
private int $note;

#[MongoDB\Field(type:"string")]
private string $commentaire;

#[MongoDB\Field(type:"date")]
private \DateTime $date;

#[MongoDB\Field(type:"string")]
private string $bookId; // ID du livre en MySQL

public function __construct()
{
$this->date = new \DateTime();
}

// Getters et setters

public function getId(): ?string
{
return $this->id;
}

public function getNote(): int
{
return $this->note;
}

public function setNote(int $note): self
{
$this->note = $note;
return $this;
}

public function getCommentaire(): string
{
return $this->commentaire;
}

public function setCommentaire(string $commentaire): self
{
$this->commentaire = $commentaire;
return $this;
}

public function getDate(): \DateTime
{
return $this->date;
}

public function setDate(\DateTime $date): self
{
$this->date = $date;
return $this;
}

public function getBookId(): string
{
return $this->bookId;
}

public function setBookId(string $bookId): self
{
$this->bookId = $bookId;
return $this;
}
}
