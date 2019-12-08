<?php


namespace App\Entity;


interface EditedDateInterface
{
 public function editedDate(\DateTimeInterface $editedDate):EditedDateInterface;
}