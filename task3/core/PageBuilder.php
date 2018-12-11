<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 25.11.2018
 * Time: 21:11
 */

namespace core;


class PageBuilder
{
    /**
     * @var Url
     */
    private $url;

    /**
     * PageBuilder constructor.
     *
     * @param Url $url
     */
    public function __construct(Url $url)
    {
        $this->url = $url;
    }

    /**
     * @return Page
     * @throws UrlLoaderException
     */
    public function buildPage(): Page
    {
        $loader = new UrlLoader($this->url);
        $loader->load();
        $content = $loader->getContent();

        $parser = new HtmlTagNameParser($content);
        $parser->parse();
        $tags = $parser->getTags();

        $storage = new HtmlTagStorage;

        foreach ($tags as $tagName) {
            if ($tag = $storage->getByTagName($tagName)) {
                $tag->incCount();
            } else {
                $tag = new HtmlTag($tagName);
                $storage->addTag($tag);
            }
        }

        $page = new Page($this->url, $content, $storage);
        return $page;
    }
}