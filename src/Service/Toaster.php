<?php
namespace App\Service;

use DateTime;
use Ramsey\Uuid\UuidFactory;

class Toaster extends Appliance
{

    public DateTime $releaseDate;

    public function __construct(DateTime $creationDate)
    {
        $this->releaseDate = $creationDate;
        parent::__construct('TEST', 'TEST');
    }

    public function test(string $mijnText)
    {
        return $mijnText;
    }
}