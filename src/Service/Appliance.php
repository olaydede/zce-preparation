<?php
namespace App\Service;

use Ramsey\Uuid\UuidFactory;

class Appliance implements DocumenTABLE
{
    use TestTraIT;

    const TITLE = 'APPLIANCE';
    public string $make;
    public string $model;
    protected string $serialNumber;
    private string $firmWare;

    /**
     * @param string $make
     * @param string $model
     */
    public function __construct(string $make, string $model)
    {
        $this->make = $make;
        $this->model = $model;
        $this->serialNumber = (new UuidFactory())->uuid4();
        $this->firmWare = rand(0,10).'.'.rand(0,10).'.'.rand(0,10);

    }

    final public function generateName($style = 'UPPER'): string
    {
        if ($style !== 'UPPER') {
            return $this->model;
        }
        return strtoupper($this->model);
    }

    public function test(string $mijnText)
    {
        return $mijnText . '';
    }

    private function laatste()
    {
        return 'FIN!';
    }

    public function sensitivityTest()
    {
        return $this->checkMySensitivity();
    }

    public function getContent(): string
    {
        return "I am calling a method that was required by a contract with a case-insensitive Interface";
    }


}