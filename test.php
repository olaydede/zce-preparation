<?php
$xml='<root>
<parent name="Peter">
    <child age="20">James</child>
	<child age="5">Leila</child>
</parent>
<parent name="Anna">
	<child age="10">Dido</child>
	<child age="11">George</child>
</parent></root>';
$xmlElement = new SimpleXMLElement($xml);
$teens = $xmlElement->xpath('*/child[@age>0]');
print $teens[1];
die();
echo $a;
session_start();
echo session_id();

/**
exit;

class SleepyHead {
    protected $name = "Dozy";

    public function __serialize() {
        $this->name = "Asleep";
    }

    Public function __unserialize() {
        $this->name = "Rested";
    }
}

$obj = unserialize(serialize(new SleepyHead()));

$arr = [1,2,3,4,5];
$spliced = array_splice($arr, 2, 1);
$number = array_shift($arr);
var_dump($arr);exit;
echo $number;


exit;
echo ("five" * 1);
iNI_SEt('memcache.allow_failover', false);
function A() {echo __CLASS__;}
A();
exit;
$a = "Hello";
$B = " world";
ECHO $a . $b;
exit;
// declare(strict_types=0);
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
require_once 'vendor/autoload.php';
dump(phpversion());
try {
    // $GLOBALS = [];
} catch (CompileError $e) {
    dump($e->getCode());
}



dump(decbin(E_ALL));
dump(decbin(E_WARNING));
dump(bindec('111111111111101'));
dump(E_ALL & ~E_WARNING);

function testMe($jef, $piet, $tom)
{
    throw new Exception('test');
    dump('zo');
}

try {
    testMe('peter', 'jost', 'piet');
} catch (Exception $e) {
    dump($e->getMessage());
} catch (Error $error) {
    dump($error->getMessage());
} catch (ArgumentCountError $e) {
    dump('counter error');
}

dump('zo');
 */