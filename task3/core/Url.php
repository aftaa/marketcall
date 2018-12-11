<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 25.11.2018
 * Time: 19:56
 */

namespace core;


class Url
{
    /**
     * @var string
     */
    private $url;

    /**
     * Url constructor.
     *
     * @param string $url
     *
     * @throws BadUrlException
     */
    public function __construct(string $url)
    {
        $this->setUrl($url);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @throws BadUrlException
     */
    public function setUrl(string $url): void
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new BadUrlException("Введен ошибочный URL: $url.");
        }
        $this->url = $url;
    }


}