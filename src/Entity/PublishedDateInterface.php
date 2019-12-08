<?php


namespace App\Entity;


interface PublishedDateInterface
{
    public function setPublishedDate(\DateTimeInterface $published):PublishedDateInterface;
}