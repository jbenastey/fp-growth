<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ExcelImport implements WithMultipleSheets
{
    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            'Data' => new DataSheetImport(),
            'Transformasi' => new TransformationSheetImport()
        ];
    }
}
