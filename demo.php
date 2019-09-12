<?php

class Solution
{
    // 数字 => 字符 集合
    private $collection = [
        '',     //0
        '',     //1
        'abc',  //2
        'def',  //3
        'ghi',  //4
        'jkl',  //5
        'mno',  //6
        'pqrs', //7
        'tuv',  //8
        'wxyz'  //9
    ];

    /**
     * @param String $number
     * @return String[]
     */
    function letterCombinations($number)
    {
        // 存储结果数组
        $res = [];

        // 判断当前字符串长度是否为0
        $len = strlen($number);
        if ($len == 0) return $res;

        // 进行递归查找操作
        $this->findCollection($number, $len, 0, '', $res);
        return $res;
    }

    /**
     * [递归]
     * @param  [type] $number [$number]
     * @param  [type] $len    [$number数组的长度]
     * @param  [type] $index  [下标]
     * @param  [type] $str    [每一次的连接结果]
     * @param  [type] &$res   [结果数组]
     */
    private function findCollection($number, $len, $index, $str, &$res, $y)
    {
        // 当下标 == 数组长度时，已经找到了最终集合, return
        if ($index == $len) {
            $res[] = $str;
            return;
        }

        // 取出定义集合中所对应的字母
        $letters = $this->collection[$number[$index]];
        // 计算长度,便循环终止使用
        $lens = strlen($letters);

        for ($i = 0; $i < $lens; ++$i) {
            // 连接上其中一个字母，下标+1，进行下一次循环
            $this->findCollection($number, $len, $index + 1, $str . $letters[$i], $res);
        }

        return $res;
    }
}

$object = new Solution();

print_r($object->letterCombinations("23"));