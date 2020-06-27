<?php

$txt1 = "Hello world!";
$txt2 = "What a nice day!";
//并置运算符 (.) 用于把两个字符串值连接起来。
echo $txt1 . " " . $txt2;
//strlen() 函数返回字符串的长度（字符数）。
echo strlen("Hello world!");
//strpos() 函数用于在字符串内查找一个字符或一段指定的文本。
//如果在字符串中找到匹配，该函数会返回第一个匹配的字符位置。如果未找到匹配，则返回 FALSE。
//字符串中第一个字符的位置是 0
echo strpos("Hello world!", "world");
