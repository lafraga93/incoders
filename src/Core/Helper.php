<?php

declare(strict_types=1);

namespace App\Core;

final class Helper
{
    /**
     * @param string $text
     * @param string $occ
     * @param  array $keys
     */
    public static function filterMailContent($text, $occ, $keys): string
    {
        $text = preg_replace(
            "/[\n|\r|\n\r|\r\n]{2,}/", '|',
            substr($text, strpos($text, $occ))
        );

        $data = explode('|', $text);

        foreach ($keys as $key => $value) {

            $content[$value] = trim(str_replace(
                $occ, '', substr(
                    $data[$key], strpos($data[$key], $occ) + strlen($occ)
                ))
            );

        }

        return json_encode($content);
    }
}
