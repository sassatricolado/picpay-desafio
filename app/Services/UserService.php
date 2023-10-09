<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Brick\Math\BigDecimal;

class UserService
{
   private UserRepository $userRepository;

    public function saveUser(User $user)
    {
        try {
            $this->userRepository->save($user);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function validateTransaction(User $sender, BigDecimal $cash)
    {
        if($sender->role_id == 2) {
            throw new \Exception('Usuário com a função de lojista não pode fazer a transação');
        }
        if($sender->cash < $cash) {
            throw new \Exception('Saldo insuficiente');
        }
    }

    public function findUserById(Int $id)
    {
        return $this->userRepository->find($id);
    }
}
