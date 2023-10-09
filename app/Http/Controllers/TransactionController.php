<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Services\TransactionService;

class TransactionController extends Controller
{
    public function __construct(
        protected TransactionService $transactionService
    ) {}

    public function create(TransactionRequest $request)
    {
        $validated = $request->validated();
        $this->transactionService->createTransaction($validated);
    }
}
