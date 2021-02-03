<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CivilStatus;

class CivilStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CivilStatus::insert(
            [
                ['civil_status' => 'Single','remarks' => 'persons who have never married. It also includes persons whose marriage has been legally annulled who were single before the annulled marriage and who have not remarried. Those who live with a common-law partner are included in this category'],
                ['civil_status' => 'Married','remarks' => 'This category includes persons whose opposite- or same-sex spouse is living, unless the couple is separated or a divorce has been obtained. Also included are persons in civil unions'],
                ['civil_status' => 'Widowed','remarks' => 'This category includes persons who have lost their legally-married spouse through death and have not remarried. Those who live with a common-law partner are included in this category'],
                ['civil_status' => 'Separated','remarks' => 'This category includes persons currently legally married but who are no longer living with their spouse and have not obtained a divorce. Those who live with a common-law partner are included in this category'],
                ['civil_status' => 'Divorced','remarks' => 'This category includes persons who have obtained a legal divorce and have not remarried. Those who live with a common-law partner are included in this category'],
            ]
        );
    }
}
