<?php

class Movie 
{
    private int $id;
    private string $name;
    private string $releaseDate;
    private string $picture;
    private string $summary;

    public function __construct
    (
        int $id,
        string $name,
        string $releaseDate,
        string $picture,
        string $summary
    )
    {
        $this->setId($id);
        $this->setName($name);
        $this->setReleaseDate($releaseDate);
        $this->setPicture($picture);
        $this->setSummary($summary);
    }

    public function getId(): int 
    {
         return $this->id; 
    }

    public function setId(int $id): self 
    {
         $this->id = $id; return $this; 
    }

    public function getName(): string 
    {
         return $this->name; 
    }

    public function setName(string $name): self 
    {
         $this->name = $name; return $this; 
    }

    public function getReleaseDate(): string 
    {
         return $this->releaseDate; 
    }

    public function setReleaseDate(string $releaseDate): self 
    {
         $this->releaseDate = $releaseDate; return $this; 
    }

    public function getSummary(): string 
    {
         return $this->summary; 
    }

    public function setSummary(string $summary): self 
    {
         $this->summary = $summary; return $this; 
    }

    public function getPicture(): string 
    {
         return $this->picture; 
    }

    public function setPicture(string $picture): self 
    {
         $this->picture = $picture; return $this; 
    }
}