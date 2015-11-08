<?php
/**
 * Created by PhpStorm.
 * User: kgurgul
 * Date: 2015-10-19
 * Time: 19:44
 */

namespace AppBundle\Utils;


class Utils
{
    private $DATE_TAG = 'Date';

    private $tagsPattern = '/{{.*\?.*}}/';

    function generateBase64Url($string)
    {
        return rtrim(strtr(base64_encode($string), '+/', '-_'), '=');
    }

    function generateUUIDWithUserId($string)
    {
        return uniqid($string);
    }

    /**
     * Return array of tags
     * <p/>
     * {array} [2]
     *   0 = {array} [2]
     *     0 = "{{Date?}}"  // name
     *     1 = 8            // index
     *   1 = {array} [2]
     *     0 = "{{Date?}}"
     *     1 = 35
     *
     * @param $body
     * @return mixed
     */
    function findTags($body)
    {
        preg_match_all($this->tagsPattern, $body, $matches, PREG_OFFSET_CAPTURE);

        return $matches[0];
    }

    /**
     * Return data from specific tag
     *
     * @param $tag
     * @return string
     */
    function getTagData($tag)
    {
        $tagName = $this->getTagName($tag);

        switch ($tagName) {
            case $this->DATE_TAG:
                $date = new \DateTime();
                return $date->format('Y-m-d H:i:s');
        }

        return '';
    }

    function getTagName($tag)
    {
        $pos = strrpos($tag, "?");

        return substr($tag, 2, $pos - 2);
    }
}