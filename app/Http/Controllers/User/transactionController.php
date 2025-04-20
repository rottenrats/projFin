<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Transaction;
use App\Http\Controllers\Controller;

class transactionController extends Controller
{
    public function index()
    {
        return view('users.transactions');
    }
    public function create(Request $request)
    {
        $budgets = Budget::all();

        $userId = $request->session()->get('user_id');
        return view(('users.transactions'), compact('budgets', 'userId'));
    }

    public function store(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'type' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|string|in:USD,EUR,RUB',
            'user_id' => 'required|exists:users,id',  // Проверяем, что user_id существует в таблице users
            'account_id' => 'required|exists:accounts,id',  // Проверяем, что account_id существует в таблице accounts
            'category_id' => 'nullable|exists:categories,id',  // Если передается, проверяем, что категория существует
            'budget_id' => 'nullable|exists:budgets,id',  // Если передается, проверяем, что бюджет существует
            'date' => 'required|date',
            'description' => 'nullable|string',
            'recurring' => 'nullable|boolean',
        ]);

        // Создаем новый объект транзакции и сохраняем его в базе данных
        $transaction = new Transaction();
        $transaction->type = $validated['type'];
        $transaction->amount = $validated['amount'];
        $transaction->currency = $validated['currency'];
        $transaction->user_id = $validated['user_id'];
        $transaction->account_id = $validated['account_id'];
        $transaction->category_id = $validated['category_id'] ?? null;  // Если ID категории не передан, сохраняем как null
        $transaction->budget_id = $validated['budget_id'] ?? null;  // Если ID бюджета не передан, сохраняем как null
        $transaction->date = $validated['date'];
        $transaction->description = $validated['description'];
        $transaction->recurring = $validated['recurring'] ?? false;  // Если не передано, ставим false

        $transaction->save();  // Сохраняем транзакцию в базе данных

        // Возвращаем успешный ответ или перенаправляем с сообщением
        return redirect()->route('transactions.store')->with('success', 'Транзакция успешно добавлена.');
    }
}
