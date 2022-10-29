<?php declare(strict_types=1);

namespace App\Services;

use App\Models\User;

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

        return $this->user->save();
    }
}
