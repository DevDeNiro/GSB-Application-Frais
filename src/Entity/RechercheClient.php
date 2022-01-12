<?php

namespace App\Entity;

class RechercheClient {


    private $user;

    private $dateUser;


     public function getUser ()
     {
         return $this-> user;
     }

     public function setUser ($user): self
     {
         $this->user = $user;

         return $this;
     }

    public function getDateUser ()
    {
        return $this-> dateUser;
    }


    public function setDateUser ($dateUser): self
    {
        $this->dateUser = $dateUser;

        return $this;
    }

}