<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository
{
    public function __construct(
        protected Transaction $model
    ) {}

    public function save(Transaction $transaction)
    {
        return $this->model->create($transaction);
    }
}
