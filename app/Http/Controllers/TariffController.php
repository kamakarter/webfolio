<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function showTariffs()
{
    $subscription = null;
    
    if (auth()->check()) {
        $subscription = Subscription::where('user_id', auth()->id())->first();
        
        if ($subscription) {
            // Обновляем статус только если end_date изменился
            $newStatus = $subscription->end_date > now();
            if ($subscription->is_active != $newStatus) {
                $subscription->is_active = $newStatus;
                $subscription->save();
            }
        }
    }

    $tariffs = Tariff::all();
    return view('pages.tariffs', compact('tariffs', 'subscription'));
}


    

    public function showAddTariffPage()
    {
        return view('pages.add_tariff');
    }

    public function addTariff(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'type_payment' => 'required|string|max:255|min:3',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string|max:25|min:3',
            'duration' => 'required|numeric|min:1',
            'pluses' => 'required|string|max:255|min:3',
        ]);

        Tariff::create($validated);

        return redirect()->route('show.admin')->with('success', 'Новый тариф успешно добавлен');
    }


    public function showEditTariffPage($id)
    {
        $tariff = Tariff::find($id);
        return view('pages.edit_tariff', compact('tariff'));
    }

    public function editTariff(Request $request, $id)
    {
        $tariff = Tariff::find($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'type_payment' => 'required|string|max:255|min:3',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string|max:25|min:3',
            'duration' => 'required|numeric|min:1',
        ]);


        $tariff->update($request->all());
        return redirect()->route('show.admin')->with('success', 'Тариф ' . $tariff->name . ' успешно обновлен');
    }


    public function showDeleteTariffPage($id)
{
        $tariff = Tariff::find($id);
        return view('pages.delete_tariff', compact('tariff'));
    }   

    public function deleteTariff($id)
    {
        $tariff = Tariff::find($id);
        $tariff->delete();
        return redirect()->route('show.admin')->with('success', 'Тариф ' . $tariff->name . ' успешно удален');
    }

    
    
    
    
}
