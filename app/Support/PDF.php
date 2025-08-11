<?php
namespace App\Support;

class PDF
{
    public static function loadView($view, $data = [])
    {
        return new class {
            public function download($name)
            {
                return response('PDF generation unavailable in this environment');
            }
        };
    }
}
