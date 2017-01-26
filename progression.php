<?php

try {

    // Получаем параметры команды
    $options = getopt("f:g::");

    // Проверяем, что последовательность передана
    if (empty($options['f'])) {
        throw new \Exception('f parameter is required');
    }

    // Разбиваем полученную строку на числа
    $data = preg_split('/[\s,.|]/', $options['f']);

    // Определяем какой тип прогрессии будем искать. По умолчанию - арифметическая
    if (isset($options['g'])) {
        $type = 'geometric';
    } else {
        $type = 'arithmetical';
    }

    $result = true;

    // Перебираем числа
    foreach ($data as $k => $v) {

        // Если встречаем не число, то сбрасываем ошибку
        if (!is_numeric($v)) {
            throw new \Exception('The data is not numeric');
        }

        // Если элемент не является последним
        if (isset($data[$k + 1])) {

            // Считаем разность/знаменатель для текущего элемента и следующего
            if ($type == 'geometric') {
                $new_d = $data[$k + 1] / $v;
            } else {
                $new_d = $data[$k + 1] - $v;
            }

            // Если это первый элемент, то разность/знаменатель просто запоминаем
            if (!isset($d)) {
                $d = $new_d;
                // Сравниваем новую разность/знаменатель с запомненным первым
                // Если они не равны, значит это не прогрессия, и выходим из цикла.
            } elseif ($d != $new_d) {
                $result = false;
                break;
            }

        }

    }

    // Выводим ответ
    echo 'This is ' . (!$result ? 'not ' : '') . "$type progression\n";

} catch (\Exception $e) {

    echo "ERROR: {$e->getMessage()}\n";

}