<?php

namespace App\ExtractData;

use Exception;

class ExtractData
{
    private const PATH = "/../../data/";
    private const EXTENSION = ".xml";

    static function dataToArray(string $file): array
    {
        $xmlFile = __DIR__ . self::PATH . $file . self::EXTENSION;
        if (!file_exists($xmlFile)) {
            throw new Exception("File not found: $xmlFile");
        }
        chmod($xmlFile, 0777);

        $xmlData = simplexml_load_file($xmlFile, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xmlData);
        $array = json_decode($json, true);

        $data = [];
        foreach ($array as $key => $valueArray) {
            foreach ($valueArray as $keyResponse => $valueResponse) {
                foreach ($valueResponse as $keyObject => $valueObject) {
                    foreach ($valueObject as $keyObjectData => $valueObjectData) {
                        $data[$keyObjectData] = $valueObjectData;
                    }
                }
            }
        }
        unset($data["type"]);
        foreach ($data as &$datum) {
            unset($datum['@attributes']);
        }
        return $data;
    }
}
