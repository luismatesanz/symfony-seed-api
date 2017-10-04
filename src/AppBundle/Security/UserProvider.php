<?php
namespace AppBundle\Security;

use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function loadUserByUsername($username){
        $user = null;
        $userFind = $this->userRepository->findByUsername($username);

        if ($userFind) {
            $user = new User();
            $user->setName($userFind["name"]);
            $user->setUsername($userFind["username"]);
            $user->setPassword($userFind["password"]);
        }

        if (!$user) {
            throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $username));
        }

        return $user;
    }

    public function refreshUser(UserInterface $user){
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }
        return new User();
    }

    public function supportsClass($class){
        return $class === 'AppBundle\Entity\User';
    }
}