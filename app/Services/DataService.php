<?php

namespace App\Services;

class DataService
{
    public function getData()
    {
        if (!file_exists('../resources/files/accounts.json')) {
            file_put_contents('../resources/files/accounts.json', json_encode([]));
        }

        $file = file_get_contents('../resources/files/accounts.json');

        return json_decode($file, true);
    }

    public function saveData()
    {
        dd('saving file');
        // // create/save file
        // $json = json_encode($array);
        // file_put_contents("myfile.json", $json);
    }
}
