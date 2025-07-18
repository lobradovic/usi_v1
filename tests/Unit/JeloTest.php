<?php

namespace Tests\Unit;
use App\Models\Jelo;
use PHPUnit\Framework\TestCase;

class JeloTest extends TestCase
{
    public function testJeloSviPodaci()
    {
        $jelo = new Jelo([
            'naziv_jela' => 'Cordon Bleu',
            'opis' => 'Odlican cordon bleu',
            'cena' => 500,
        ]);

        $this->assertEquals('Cordon Bleu', $jelo->naziv_jela);
        $this->assertEquals('Odlican cordon bleu', $jelo->opis);
        $this->assertEquals(500, $jelo->cena);
    }
}
