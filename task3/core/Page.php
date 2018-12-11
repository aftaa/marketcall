<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 25.11.2018
 * Time: 19:51
 */

namespace core;


class Page
{
    /**
     * @var Url
     */
    private $url;
    /**
     * @var string
     */
    private $html;
    /**
     * @var HtmlTagStorage
     */
    private $tags;

    /**
     * Page constructor.
     *
     * @param Url            $url
     * @param string         $html
     * @param HtmlTagStorage $tags
     */
    public function __construct(Url $url, string $html, HtmlTagStorage $tags)
    {
        $this->url = $url;
        $this->html = $html;
        $this->tags = $tags;
    }

    /**
     * @return Url
     */
    public function getUrl(): Url
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getHtml(): string
    {
        return $this->html;
    }

    /**
     * @return HtmlTagStorage
     */
    public function getTags(): HtmlTagStorage
    {
        return $this->tags;
    }

}