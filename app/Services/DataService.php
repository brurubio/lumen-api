<?php

namespace App\Services;

class DataService
{
    const FILE_PATH = 'accounts.json';

    public function getData()
    {
        if (!file_exists(self::FILE_PATH)) {
            file_put_contents(self::FILE_PATH, json_encode([], JSON_FORCE_OBJECT));
        }

        $file = file_get_contents(self::FILE_PATH);

        return json_decode($file, true);
    }

    public function saveData($data)
    {
        $fullData = $this->getData();

        $newData = array_replace($fullData, [
            $data['id'] => $data,
        ]);

        file_put_contents(self::FILE_PATH, json_encode($newData));

        return $data;
    }

    public function removeData()
    {
        file_put_contents(self::FILE_PATH, json_encode([], JSON_FORCE_OBJECT));
    }
}
