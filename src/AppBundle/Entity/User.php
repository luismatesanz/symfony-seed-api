<?php
namespace AppBundle\Entity;

class User implements \Symfony\Component\Security\Core\User\UserInterface
{
    private $username;
    private $password;
    private $name;

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function getSalt()
    {
        return '';
    }
    public function eraseCredentials()
    {
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

}