<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $specializations = [
            'Дорожный рабочий',
            'Машинист смесителя а/б',
            'Машинист б/с установки',
            'Помощник б/с установки',
            'Машинист б/с передвижного',
            'Машинист ц/б смесителя',
            'Водитель погрузчика',
            'Машинист бульдозера',
            'Машинист автогрейдера',
            'Машинист экскаватора',
            'Машинист укладчика асфальтобетона',
            'Машинист перегружателя',
            'Машинист фрезы',
            'Машинист БУК',
            'Машинист заливщика швов',
            'Машинист катка на пневматических шинах',
            'Машинист катка с гладкими вальцами',
            'Машинист компрессорных установок',
            'Машинист копра',
            'Тракторист',
        ];

        foreach ($specializations as $specialization) {
            Specialization::create(['name' => $specialization]);
        }
    }
}