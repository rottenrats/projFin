<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Http\Controllers\Controller;

class budgetViewController extends Controller
{
    public function index(Request $request)
    {
        $company_id = $request->session()->get('company_id');
        $budgets = Budget::where('company_id', $company_id)->get();

        return view('users.budget', [
            'budgets' => $budgets,
            'activeTab' => $request->input('activeTab', 'form'), // Передача активной вкладки
            'company_id' => $company_id
        ]);
    }

    public function show($id)
    {
        // Получаем компанию текущего пользователя из сессии
        $company_id = session('company_id'); // Или другой способ получения ID компании
    
        // Ищем бюджет по ID и company_id
        $budget = Budget::where('id', $id)->where('company_id', $company_id)->first();
    
        if (!$budget) {
            abort(404, 'Бюджет с таким ID не найден или не принадлежит вашей компании');
        }
    
        // Пример данных для графика
        $chartData = [
            ['label' => 'Апрель', 'value' => 12000],
            ['label' => 'Май', 'value' => 8000],
            ['label' => 'Июнь', 'value' => 15000],
        ];
    
        return view('budgets.show', compact('budget', 'chartData'));
    }

    public function create(Request $request)
    {
        $company_id = $request->session()->get('company_id');
        return view(('budgets._form'), compact('company_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Budget::create($request->all());

        return redirect()->route('budgets.index', ['activeTab' => 'table'])
        ->with('success', 'Бюджет добавлен!');
    }
}
