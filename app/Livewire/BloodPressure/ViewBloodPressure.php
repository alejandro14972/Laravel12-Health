<?php

namespace App\Livewire\BloodPressure;

use App\Models\BloodPressure;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class ViewBloodPressure extends Component
{

    #[On('deletebloodPressure')]
    public function deletebloodPressure($bloodPressureId)
    {
        $bloodPressure = BloodPressure::find($bloodPressureId);
        $elemteoBorrado = $bloodPressure[0];
        $elemteoBorrado->delete();
    }



    public function render()
    {
        //datos tabla
        $bloodPressureData = BloodPressure::where('user_id', auth()->id())
            ->where('date', '>=', Carbon::now()->subDays(7))
            ->orderBy('date', 'asc')
            ->paginate(7);

        //datos grafica todo mañana

        $bloodPressureDataAllMorning = BloodPressure::where('user_id', auth()->id())
            ->where('date', '>=', Carbon::now()->subDays(7))
            ->where('time', 'morning')
            ->orderBy('date', 'asc')
            ->get();


        //datos gráfica todo tarde
        $bloodPressureDataAllEvening = BloodPressure::where('user_id', auth()->id())
            ->where('date', '>=', Carbon::now()->subDays(7))
            ->where('time', 'evening')
            ->orderBy('date', 'asc')
            ->get();

        //eje de las x para media
        $bloodTime = BloodPressure::where('user_id', auth()->id())
            ->select('date')
            ->where('date', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->get();

        //media de las y mañanas
        $bloodPressureDataAvgMorning = BloodPressure::where('user_id', auth()->id())
            ->where('time', 'morning')
            ->where('date', '>=', Carbon::now()->subDays(7)) // Últimos 7 días
            ->orderBy('date', 'asc')
            ->selectRaw('date, AVG(systolic) as avg_systolic, AVG(diastolic) as avg_diastolic')
            ->groupBy('date')
            ->get();

        //media de las y tardes
        $bloodPressureDataAvgEvening = BloodPressure::where('user_id', auth()->id())
            ->where('time', 'evening')
            ->where('date', '>=', Carbon::now()->subDays(7))
            ->orderBy('date', 'asc')
            ->selectRaw('date, AVG(systolic) as avg_systolic, AVG(diastolic) as avg_diastolic')
            ->groupBy('date')
            ->get();

        //dd($bloodPressureDataAvgEvening);

        return view('livewire.blood-pressure.view-blood-pressure', [
            'bloodPressureData' => $bloodPressureData,
            'bloodTime' => $bloodTime,
            'bloodPressureDataAvgMorning' => $bloodPressureDataAvgMorning,
            'bloodPressureDataAvgEvening' => $bloodPressureDataAvgEvening,
            'bloodPressureDataAllMorning' => $bloodPressureDataAllMorning,
            'bloodPressureDataAllEvening' => $bloodPressureDataAllEvening,
        ]);
    }
}
