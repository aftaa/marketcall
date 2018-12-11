<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 25.11.2018
 * Time: 21:00
 */

namespace core;


class HtmlTagStorage
{
    /**
     * @var HtmlTag[]
     */
    private $tags = [];

    /**
     * @param string $tagName
     *
     * @return HtmlTag
     */
    public function getByTagName(string $tagName)
    {
        if (array_key_exists($tagName, $this->tags)) {
            return $this->tags[$tagName];
        }
    }

    /**
     * @param HtmlTag $tag
     */
    public function addTag(HtmlTag $tag)
    {
        $this->tags[$tag->getName()] = $tag;
    }

    /**
     * @return HtmlTag[]
     */
    public function getAll()
    {
        return $this->tags;
    }
}