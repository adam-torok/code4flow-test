<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PoemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public $poems = [
        'Itt születtem, itt élek, és itt halok meg!
        Csak egy kérdés: mi fáj?!
        Ha válaszolsz, folytatom!!',

        'E pár sorban van hiúságom
        És minden vágyam eltemetve.
        Többé semmi sincs már kezembe`.
        Egyetlen hang sem maradt számon.',

        'Most ez egyszer. Utána nem bánom.
        Tapossátok el lelkem, hadd fájjon.
        Legyen bármi, én már nem félek.',
        
        'Faluszélén muzsika,
        táncol a kis Zsuzsika.
        Pörög-forog szoknyája.
        Nézd, hogy járja a lába.',

        'Feketerigó szállt szívemre,
        Bánatát messzire fütyüli,
        Kedves párját rég nem találja,
        A szerelmet földbe temeti.',

        'Szívem nemes tűzhely,
        Benne ég minden érzés,
        Ami létezett, és még nincs,
        Ami van, mind a legnagyobb kincs...',

        'Éljen, éljen! Brekeg néped,
        s a mocsárban kiáll érted.
        Szemük dülledt, rajta hályog,
        nem sikerül tisztán látnok.',

        'Egyik kezemben fakanál,
        másik kezemben egy pohár,
        tele finom vörösborral,
        a finom szőlő zamatával',
    
        'Egy Évkönyvet keresve
        Anyukám Emlékkönyve
        Került épp a kezembe.',

        'Érik már a szőlő, babám, gyere, szedjed.
        Finom szőlőből édes nektár legyen.
        Édes, mint a csókod, oly forró, mint a jó bor.
        Szedjük, szedjük gyorsan kosárral, ládával.
        Még a szüret tart, addig szedem babámmal.',

        'Nem látod a fától a nagy erdőt.
        Pedig oly szép, szívmelengető.
        A madarak dalát sem hallod.
        Pedig szívből dalolnak, tudod.',

        'Ma még messze ködlött az ősz,
        medvét kerget Szárhegyen a csősz,
        megpihent a parkban, a kőhídon,
        ne próbálkozz vele, igen kigyúrt idom.'
        ];

        public function definition(){
            return [
                'user_id' => $this->faker->numberBetween(1,20),
                'title' => $this->faker->text(15),
                'text' => $this->faker->randomElement($this->poems),
                'status' => $this->faker->randomElement(['APPROVED', 'DECLINED', 'WAITING']),
                'category_id' => $this->faker->numberBetween(1,6)
            ];
    }
}
