<?php
#PHP 字符串函数是 PHP 核心的组成部分。无需安装即可使用这些函数。

#输出
echo("Hello world!"); #输出一个或多个字符串。


#print() 输出一个或多个字符串。
$foo = "example";
print "foo is $foo";

if (print "hello") {
    echo " world";
}
#printf() 输出格式化的字符串。
$n = 43951789;
$u = -43951789;
$c = 65; // ASCII 65 is 'A'

// notice the double %%, this prints a literal '%' character
printf("%%b = '%b'\n", $n); // binary representation
printf("%%c = '%c'\n", $c); // print the ascii character, same as chr() function
printf("%%d = '%d'\n", $n); // standard integer representation
printf("%%e = '%e'\n", $n); // scientific notation
printf("%%u = '%u'\n", $n); // unsigned integer representation of a positive integer
printf("%%u = '%u'\n", $u); // unsigned integer representation of a negative integer
printf("%%f = '%f'\n", $n); // floating point representation
printf("%%o = '%o'\n", $n); // octal representation
printf("%%s = '%s'\n", $n); // string representation
printf("%%x = '%x'\n", $n); // hexadecimal representation (lower-case)
printf("%%X = '%X'\n", $n); // hexadecimal representation (upper-case)

printf("%%+d = '%+d'\n", $n); // sign specifier on a positive integer
printf("%%+d = '%+d'\n", $u); // sign specifier on a negative integer

//查找
//chop() 删除字符串右侧的空白字符或其他字符。
//stripos() 返回字符串在另一字符串中第一次出现的位置（对大小写不敏感）。
//stristr() 查找字符串在另一字符串中第一次出现的位置（大小写不敏感）。
//substr_count() 计算子串在字符串中出现的次数
echo substr_count("2021-07-25 05:44:11", "-");#2
//strpbrk() 在字符串中查找一组字符的任何一个字符。
//strpos() 返回字符串在另一字符串中第一次出现的位置（对大小写敏感）。
//strrchr() 查找字符串在另一个字符串中最后一次出现。
//strspn() 返回在字符串中包含的特定字符的数目。
//substr() 返回字符串的一部分。
//substr_compare() 从指定的开始位置（二进制安全和选择性区分大小写）比较两个字符串。
//strcasecmp() 比较两个字符串（对大小写不敏感）。
//strchr() 查找字符串在另一字符串中的第一次出现。（strstr() 的别名。）
//strcmp() 比较两个字符串（对大小写敏感）。
//strcoll() 比较两个字符串（根据本地设置）。
//strncasecmp() 前 n 个字符的字符串比较（对大小写不敏感）。
//strncmp() 前 n 个字符的字符串比较（对大小写敏感）。

//修改
//ltrim() 移除字符串左侧的空白字符或其他字符。
//trim() 移除字符串两侧的空白字符和其他字符。
//rtrim() 移除字符串右侧的空白字符或其他字符。
//strtolower() 把字符串转换为小写字母。
//strtoupper() 把字符串转换为大写字母。
//substr_replace() 把字符串的一部分替换为另一个字符串。
//strrev() 反转字符串。
//strtr() 转换字符串中特定的字符。
//str_ireplace() 替换字符串中的一些字符（对大小写不敏感）。
//str_pad() 把字符串填充为新的长度。
//str_replace() 替换字符串中的一些字符（对大小写敏感）。
//money_format() 返回格式化为货币字符串的字符串。
//str_shuffle() 随机地打乱字符串中的所有字符。

//类型转换
//explode() 把字符串打散为数组。
explode('&', $paramarr['query'])
//chr() 从指定的 ASCII 值返回字符。
//strtok() 把字符串分割为更小的字符串。
//hex2bin() 把十六进制值的字符串转换为 ASCII 字符。
//str_split() 把字符串分割到数组中。
//统计
//strlen() 返回字符串的长度。
//str_word_count() 计算字符串中的单词数。
//生成
//html_entity_decode() 把 HTML 实体转换为字符。
//htmlentities() 把字符转换为 HTML 实体。
//md5() 计算字符串的 MD5 散列。
//md5_file() 计算文件的 MD5 散列。
//convert_uudecode() 解码 uuencode 编码字符串。
//convert_uuencode() 使用 uuencode 算法对字符串进行编码。
//str_repeat() 把字符串重复指定的次数。
//sha1() 计算字符串的 SHA-1 散列。
//sha1_file() 计算文件的 SHA-1 散列。
//implode() 返回由数组元素组合成的字符串。
//特色功能
//similar_text() 计算两个字符串的相似度。
//strip_tags() 剥去字符串中的 HTML 和 PHP 标签。
