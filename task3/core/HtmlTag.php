<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 25.11.2018
 * Time: 20:54
 */

namespace core;


class HtmlTag
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $count;

    /**
     * HtmlTag constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->count = 1;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * Increments count of this tag.
     */
    public function incCount(): void
    {
        $this->count++;
    }


}