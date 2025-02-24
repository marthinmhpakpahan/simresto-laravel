<?php

namespace App\Http\Controllers;

class CommonFunction
{
    public static function uploadFiles($files, $type, $additional="") {
        $multiple_files = true;
        if(!is_array($files)) {
            $files = [$files];
            $multiple_files = false;
        }
        $file_paths = [];
        foreach($files as $file){
            $FOLDER_DESTINATION = [
                'PHOTO' => "assets/img/karyawan/photos/",
                'IDENTITY_CARD' => "assets/img/karyawan/identity_cards/",
                'MATERIAL_IMAGE' => "assets/img/material/images/",
            ];
    
            $file_extension = $file->getClientOriginalExtension();
            $folder_destination = $FOLDER_DESTINATION[$type];
            $destination_filename = str()->random(10) . "" . time() . "." . $file_extension;
            $file->move($folder_destination, $destination_filename);
            $file_paths[] = $folder_destination . $destination_filename;
        }

        if($multiple_files == true) {
            return $file_paths;
        }
        return $file_paths[0];
    }

    public static function convertWeight($total, $unit_source, $unit_target) {
        $UNIT_CONVERTION = [

        ];
        $new_total = 0;

        return $new_total;
    }
}