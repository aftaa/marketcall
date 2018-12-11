<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 25.11.2018
 * Time: 20:53
 */

namespace core;


class HtmlTagNameParser
{
    /**
     * @var string
     */
    private $html;
    /**
     * @var string[]
     */
    private $tags;

    /**
     * HtmlParser constructor.
     *
     * @param string $html
     */
    const PATTERN = '/<([a-z0-9]+)( |>)/i';

    public function __construct(string $html)
    {
        $this->html = $html;
    }

    /**
     * Parse tags from html.
     */
    public function parse()
    {
//        $page = preg_replace('{<script>.*?</script>}i', '<script></script>', $page);
//        $page = preg_replace('{<style>.*?</style>}i', '<style></style>', $page);
//        $page = preg_replace("{\r|\n}", ' ', $page);
        $matches = [];
        preg_match_all(self::PATTERN, $this->html, $matches);
        $this->tags = $matches[1];
        foreach ($this->tags as &$tag) {
            $tag = strtolower($tag);
        }
    }

    /**
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }
}