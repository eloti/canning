<?php

namespace App\Services;

use App\Address;

class CheckBillingAddress
{
    public function hasBillingAddress($clientId)
    {
        $otherAddresses = Address::select('id', 'billing_address')
            ->where('client_id', '=', $clientId)
            ->get();

        $hasBillingAddress = 'NO';

        foreach ($otherAddresses as $otherAddress) {
            if ($otherAddress->billing_address === 1) {
                $hasBillingAddress = 'YES';
                break;
            }
        }

        return [
            'hasBillingAddress' => $hasBillingAddress,
          
        ];
    }
}
