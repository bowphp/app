<?php

namespace App\Services;

use App\Models\User;
use Bow\Database\Collection;

class UserService
{
    /**
     * Define the instance of user model
     */
    private User $user;

    /**
     * UserService constructor
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get all available users
     *
     * @return Collection
     */
    public function fetchAll(): ?Collection
    {
        return $this->user->get();
    }

    /**
     * Create new user
     *
     * @param string $name
     * @param string $lastname
     * @param string $email
     * @return User
     */
    public function create(string $name, string $lastname, string $email): ?User
    {
        $this->user->name = $name;
        $this->user->lastname = $lastname;
        $this->user->email = $email;
        $this->user->password = app_hash("password");
        $this->user->save();

        return $this->user;
    }
}
