<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 25.11.2018
 * Time: 3:29
 */

/*2. Имеется массив числовых значений [4, 5, 8, 9, 1, 7, 2]. В распоряжении есть функция array_swap(&$arr, $num) { … }
которая меняем местами элемент на позиции $num и элемент на 0 позиции.  Т.е. при выполнении array_swap([3, 6, 2], 2)
на выходе получим [2, 6, 3].

Написать код, сортирующий массив по возрастанию, используя только функцию array_swap.
*/

if (PHP_VERSION < '7.1') {
    echo 'Minimum PHP version is 7.1';
    exit();
}

/**
 * @param array $arr
 * @param int   $num
 */
function array_swap(array & $arr, int $num): void
{
    [$arr[0], $arr[$num]] = [$arr[$num], $arr[0]];
}

/**
 * Class ArraySwapSort
 */
class ArraySwapSort
{
    /**
     * @var array
     */
    public $array = [];
    /**
     * @var int
     */
    private $negativeIndex = 0;
    /**
     * @var int
     */
    private $arraySize = 0;

    /**
     * ArraySwapSort constructor.
     *
     * @param array $array
     */
    public function __construct(array & $array = [])
    {
        $this->array =& $array;
        $this->arraySize = count($array);
    }

    /**
     * Sorting an array.
     */
    public function sort()
    {
        $swapHappened = false;
        $max = $this->getMax();
        $lastIndex = $this->arraySize - $this->negativeIndex - 1;

        for ($i = 0; $i < $lastIndex; $i++) {
            if ($this->array[$i] >= $max) {
                $max = $this->array[$i];
                array_swap($this->array, $i);
                array_swap($this->array, $lastIndex);
                $swapHappened = true;
            }
        }
        if (++$this->negativeIndex < $this->arraySize && $swapHappened) {
            $this->sort();
        }
    }

    /**
     * @return int
     */
    private function getMax()
    {
        if ($this->negativeIndex) {
            $max = $this->array[$this->arraySize - $this->negativeIndex - 1];
        } else {
            $max = PHP_INT_MIN;
        }
        return $max;
    }
}

$array = [4, 5, 8, 9, 1, 7, 2];
$sorter = new ArraySwapSort($array);
$sorter->sort();
