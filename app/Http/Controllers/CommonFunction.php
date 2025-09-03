<?php

namespace App\Http\Controllers;

class CommonFunction
{
    private static $conversionMap = [
        // weight
        "MG"  => ["base" => "G", "factor" => 0.001],
        "G"   => ["base" => "G", "factor" => 1],
        "KG"  => ["base" => "G", "factor" => 1000],
        "TON" => ["base" => "G", "factor" => 1000000],

        // volume
        "ML"  => ["base" => "L", "factor" => 0.001],
        "L"   => ["base" => "L", "factor" => 1]
    ];

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
                'MENU_IMAGE' => "assets/img/menu/images/",
                'ATTENDANCE' => "assets/img/karyawan/attendances/",
                'LEAVE' => "assets/img/karyawan/leaves/",
                'INVOICE' => "assets/img/material/invoices/",
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

    public static function getFullNameUnit($abbreviation) {
        $data = [
            "G" => "Gram",
            "KG" => "Kilogram",
            "ML" => "Mililiter",
            "L" => "Liter",
        ];
        return $data[$abbreviation];
    }

    private static function convertUnit($value, $unit_source, $unit_target) {
        $unit_source = ($unit_source);
        $unit_target = ($unit_target);

        // if both units have the same base (weight→weight OR volume→volume)
        if (self::$conversionMap[$unit_source]["base"] === self::$conversionMap[$unit_target]["base"]) {
            $inBase = $value * self::$conversionMap[$unit_source]["factor"];
            return $inBase / self::$conversionMap[$unit_target]["factor"];
        }

        // if converting between weight and volume → assume water density (1g = 1ml)
        if (self::$conversionMap[$unit_source]["base"] === "g" && self::$conversionMap[$unit_target]["base"] === "l") {
            // weight → volume
            $grams = $value * self::$conversionMap[$unit_source]["factor"];
            return $grams / 1000; // convert grams → liters
        }

        if (self::$conversionMap[$unit_source]["base"] === "l" && self::$conversionMap[$unit_target]["base"] === "g") {
            // volume → weight
            $liters = $value * self::$conversionMap[$unit_source]["factor"];
            return $liters * 1000; // convert liters → grams
        }

        return 0;
    }

    public static function calculateNewPrice($beforePrice, $beforeWeight, $beforeUnit, $afterWeight, $afterUnit) {
        // normalize both weights to base unit (g or L)
        $beforeWeightInBase = self::convertUnit($beforeWeight, $beforeUnit, self::$conversionMap[$beforeUnit]["base"]);
        $afterWeightInBase  = self::convertUnit($afterWeight, $afterUnit, self::$conversionMap[$afterUnit]["base"]);

        // calculate price proportionally
        $newPrice = $beforePrice * ($afterWeightInBase / $beforeWeightInBase);

        return floor($newPrice);
    }

    public static function convertWeight($total, $unit_source, $unit_target) {
        $new_total = 0;
        if($unit_source == "KG" && $unit_target == "G") {
            $new_total = $total * 1000;
        } else if($unit_source == "OZ" && $unit_target == "G") {
            $new_total = $total * 100;
        } else if($unit_source == "MG" && $unit_target == "G") {
            $new_total = $total / 10;
        } else if($unit_source == "KW" && $unit_target == "G") {
            $new_total = $total * 100000;
        } else if($unit_source == "T" && $unit_target == "G") {
            $new_total = $total * 1000000;
        } else if($unit_source == "G" && $unit_target == "MG") {
            $new_total = $total * 10;
        } if($unit_source == "L" && $unit_target == "ML") {
            $new_total = $total * 1000;
        }

        return $new_total;
    }
}