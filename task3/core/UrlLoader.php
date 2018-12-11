<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 25.11.2018
 * Time: 20:44
 */

namespace core;


class UrlLoader
{
    /**
     * @var Url
     */
    private $url;
    /**
     * @var string
     */
    private $content;

    /**
     * UrlLoader constructor.
     *
     * @param Url $url
     */
    public function __construct(Url $url)
    {
        $this->url = $url;
    }

    /**
     * @throws UrlLoaderException
     */
    public function load()
    {
        $content = file_get_contents($this->url->getUrl());
        if (false === $content) {
            throw new UrlLoaderException("Ошибка при загрузке страницы: {$this->url->getUrl()}.");
        }
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}