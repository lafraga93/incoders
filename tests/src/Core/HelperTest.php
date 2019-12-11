<?php

declare(strict_types=1);

use App\Core\Helper;
use PHPUnit\Framework\TestCase;

final class HelperTest extends TestCase
{
    public function testFilterMailContentMustGenerateValidJson(): void
    {
        $text = "
            Nome: Meu Cliente Favorito\n
            Endereço: Rua General Lima e Silva, 928\n
            Valor: R$1.300,50\n
            Vencimento: 12/19\n
        ";

        $occurrence = ':';
        $keys = ['name', 'address', 'amount', 'due'];

        $content = Helper::filterMailContent($text, $occurrence, $keys);

        $expectedJson = '{
            "name": "Meu Cliente Favorito",
            "address": "Rua General Lima e Silva, 928",
            "amount": "R$1.300,50",
            "due": "12/19"
        }';

        $this->assertJsonStringEqualsJsonString(
            $expectedJson,
            $content
        );
    }
}
