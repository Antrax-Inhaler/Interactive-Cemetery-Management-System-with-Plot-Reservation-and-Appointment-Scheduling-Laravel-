<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RulesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('rules')->insert([
            [
                'title' => 'Flowers & Decoration',
                'content' => '
                    <ul>
                        <li>Lit candles, potted plants, plastic vases, balloons and food are permitted on the grounds.</li>
                        <li>Decorations hung from trees, plants, or shrubs are <b>NO</b> permitted.</li>
                        <li>All large decorations that encroach upon another family’s site will be removed, as well as those which obstruct the normal daily operations of the park (burials, landscaping, etc.). Before the item is removed or disposed of, every effort will be made to notify the family, however, the Park cannot assume responsibility if contact is not made.</li>
                        <li>All decorations are the sole responsibility of the family. Greenpark Memorial Garden is not responsible for flowers or decorations placed on a grave or mausoleum crypt. Artificial flowers are permitted in the Mausoleums. Artificial flowers left on interment sites are allowed.</li>
                        <li>Flowers and decorations are removed each Thursday and Friday, except for special seasons.</li>
                        <li>Flowers are a lovely gift and will be left on the site or outside the mausoleum on the lawn up to two days after a funeral service. If you are planning to retrieve any floral arrangements after a funeral, we suggest you do so at the conclusion of the service.</li>
                        <li>We ask that you respect the property of others.</li>
                    </ul>
                '
            ],
            [
                'title' => 'Reverence & Safety',
                'content' => '
                    <ul>
                        <li>While visiting, we ask for quiet and reverence. Loud and abusive conduct is not allowed, and alcohol is never permitted.</li>
                        <li>Children under 16 must be accompanied by an adult at all times and must <b>NEVER</b> be left alone in vehicles.</li>
                        <li>Please lock your vehicle while visiting a site. Greenpark Memorial Garden is not responsible for lost or stolen goods.</li>
                        <li>Dogs and other pets are allowed in the Park.</li>
                        <li>We ask that visitors refrain from using skateboards, bicycles, roller blades, and roller skates as they are not allowed.</li>
                    </ul>
                '
            ]
        ]);
    }
}
