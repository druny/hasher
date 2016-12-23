<?php


namespace app\Helpers;


class SimpleXmlHelper
{

    /*
     * Create XML file about users
     *
     * Use SimpleXml expansion
     *
     * */
    public static function create($users)
    {
        $xmlUsersInfo = new \SimpleXMLElement("<?xml version=\"1.0\"?><root></root>");
        self::arrayToXml($users, $xmlUsersInfo);

        $domDocument = new \DOMDocument('1.0');
        $domDocument->formatOutput = true;
        $domDocument->preserveWhiteSpace = false;
        $domDocument->loadXML($xmlUsersInfo->asXML());

        return $domDocument->saveXML();
    }


    /*
     * Change Array to XML
     * */
    private static function arrayToXml($array, &$xmlUsersInfo)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subspecies = $xmlUsersInfo->addChild("$key");
                    self::arrayToXml($value, $subspecies);
                } else {
                    $subspecies = $xmlUsersInfo->addChild("user$key");
                    self::arrayToXml($value, $subspecies);
                }
            } else {
                $xmlUsersInfo->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }

}