<?php

class DevilFruit
{
    private $name;
    private $meaning;
    private $currentUser;
    private $pastUsers = array();
    private $picture;
    private $categoria; // Novo parâmetro adicionado

    public function __construct($name, $meaning, $currentUser, $picture, $categoria) // Atualizado para incluir a categoria
    {
        $this->name = $name;
        $this->meaning = $meaning;
        $this->currentUser = $currentUser;
        $this->picture = $picture;
        $this->categoria = $categoria; // Inicializa o novo parâmetro
    }

    public function changeUser($newUser)
    {
        array_push($this->pastUsers, $this->currentUser);
        $this->currentUser = $newUser;
    }

    // Getters and setters for all the properties if required
    // ...

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getMeaning()
    {
        return $this->meaning;
    }

    public function setMeaning($meaning)
    {
        $this->meaning = $meaning;
    }

    public function getCurrentUser()
    {
        return $this->currentUser;
    }

    public function setCurrentUser($currentUser)
    {
        $this->currentUser = $currentUser;
    }

    public function getPastUsers()
    {
        return $this->pastUsers;
    }

    public function setPastUsers($pastUsers)
    {
        $this->pastUsers = $pastUsers;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getCategoria() // Novo método getter para a categoria
    {
        return $this->categoria;
    }

    public function setCategoria($categoria) // Novo método setter para a categoria
    {
        $this->categoria = $categoria;
    }
}
