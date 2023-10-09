<?php

namespace App\Services;

use App\Repositories\TransactionRepository;

class TransactionService
{
    protected TransactionRepository $repository;
    protected UserService $userService;

    public function createTransaction($transaction)
    {
        $sender = $this->userService->findUserById($transaction->payer_id);
        $this->userService->validateTransaction($sender, $transaction->value);

        try {
            $this->repository->save($transaction);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
