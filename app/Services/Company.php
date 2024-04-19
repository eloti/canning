<?php

namespace App\Services;

class Company
{
	protected static $company = [	
		'legal_name' => 'Heavy Service S.A.',
		'commercial_name' => 'Heavy Service',
		'cuit_num' => '30708865598',
		'cuit_num_show' => '30-70886559-8',
		'iibb_num' => '9024909012',
		'iibb_num_show' => '902-490901-2',
		'founded' => '10-08-2004',
		'vat_status' => 'IVA Responsable Inscripto',
		'line1' => 'Gral. Riccheri 1128',
		'city' => 'Don Torcuato Este',
		'county' => 'Tigre',
		'zip_code' => 'B1611IHB',
		'province' => 'Buenos Aires'
	];

	public static function company()
	{
		return static::$company;
	}

}