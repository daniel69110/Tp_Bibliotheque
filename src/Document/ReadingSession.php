<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class ReadingSession
{
    #[MongoDB\Id]
    private ?string $id = null;

    #[MongoDB\Field(type: "int")]
    private ?int $pagesLues = null;

    #[MongoDB\Field(type: "float")]
    private ?float $tempsPasse = null;

    #[MongoDB\Field(type: "string")]
    private ?string $notesPersonnelle = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getPagesLues(): ?int
    {
        return $this->pagesLues;
    }

    public function setPagesLues(int $pagesLues): void
    {
        $this->pagesLues = $pagesLues;
    }

    public function getTempsPasse(): ?float
    {
        return $this->tempsPasse;
    }

    public function setTempsPasse(float $tempsPasse): void
    {
        $this->tempsPasse = $tempsPasse;
    }

    public function getNotesPersonnelle(): ?string
    {
        return $this->notesPersonnelle;
    }

    public function setNotesPersonnelle(string $notesPersonnelle): void
    {
        $this->notesPersonnelle = $notesPersonnelle;
    }
}
