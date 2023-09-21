<?php
declare(strict_types=0);
namespace App\Controller;

use App\SerVICe\Appliance;
use App\Service\Documentable;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\ErrorHandler\Error\FatalError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function App\Utility\myGenerator;

define('App\Utility\TEST', 'Andere namespace');
define('TEST', 'Globale namespace?');
define('TEST', 'Globale namespace 2?');

class PagesController extends AbstractController
{
    const TEST = 'Class Constant';

    protected DateTime $runDateTime;

    public function __construct()
    {
        $this->runDateTime = new DateTime();
    }


    public function makeBadRange($limit)
    {
        $data = [];
        for ($i = 0; $i < $limit; $i++) {
            $data[] = $i;
        }
        return $data;
    }


    public function makeGoodRange($limit)
    {
        for ($i = 0; $i < $limit; $i++) {
            yield $i;
        }
    }

    private function testMij()
    {
        return 'hoi';
    }

    #[Route("/", name: "home")]
    public function indexAction(Request $request)
    {
        register_shutdown_function(fn() => dump('Shutting down...'));
        ////


        try {
            dump(strlen('haoo', 5));
        } catch (\ArgumentCountError $e) {
            dump($e->getMessage());
        }
        $test = function ($jos, $piet, $tim) { dump('hoi');};
        $test('hall');
        dd('zo');
        dump(passthru('ls -l /'));
        // dump(system('ls -l /'));
        // dump(shell_exec('ls -l /'));
        // dump(`ls -l /`);
        dd();
        dump(exec('ls -l'));
        dump(shell_exec('ls -l'));
        dump(system('ls -l'));
        dump(passthru('ls -l'));
        dd();

        $myOutput = [];
        $myResult = [];
        exec(escapeshellcmd('ls -l /'), $myOutput, $myResult);
        dump($myOutput);
        dump($myResult);
        dd('End');
        passthru(escapeshellcmd('ls -l /'));
        dd();
        $directoryToList = escapeshellarg("/");
        dd(`ls -l $directoryToList`);
        dd(system("ls -l"));
        $command = escapeshellarg("ls -l;");
        dd(exec($command));
        dd(`$command`);
        $test = fn() => dump(Documentable::class);
        $test();
        dd('zo');
        dd(PagesController::class);
        dd(get_defined_constants());
        dump(TEST);
        dd('HOI');
        dd(get_defined_constants());
        dd();
        echo defined('App\Utility\TEST');
        echo defined('self::TEST');
        echo defined('TEST');

        dump(TEST);
        dump(self::TEST);
        dump(constant('App\Controller\PagesController::TEST'));
        dump(constant('App\Utility\TEST'));
        // dump(constant(__NAMESPACE__.'\TEST'));

        dd();
        dump(constant(""));
        dump(constant('TEST'));
        dd(constant('App\Controller\PagesController::TEST'));
        dd($_SERVER);
        // file_get_contents('https://www.google.com');
        // dump($http_response_header);
        dd(get_headers('https://www.outlook.com'));
        dd($_COOKIE);
        // dd(getenv("OLAY"));
        dd($_ENV);
        $test = ['foo|bar' => 'test'];
        dd($test);
        dd($_SESSION);
        dump(array_keys($_REQUEST));
        // dd(array_keys($_SERVER));
        dd();
        $test = ['foo' => 'bar'];
        $copy = $test;
        $copy['foo'] = 'modified';
        dd($test);
        dd(ini_get('variables_order'));

        echo 'hoi';
        // dd(ini_get('memory_limit'));
        // echo `php --ini`;
        dd($GLOBALS);
        $hexConverter = function($hex) {
            return [
                'red' => hexdec(substr($hex, 0, 2)),
                'green' => hexdec(substr($hex, 2, 2)),
                'blue' => hexdec(substr($hex, 4, 2)),
            ];
        };
        $hexConverterTwo = function ($hex) {
            if (! preg_match('/^[0-9A-Fa-f]{6}$/i', $hex)) {
                return null;
            }
            $bin = bindec(base_convert('FEA946', 16, 2));
            return [
                'red' => $bin >> 16,
                'green' => ($bin & 0x00FF00) >> 8,
                'blue' => $bin & 0x0000FF,
            ];
        };
        $hex = "FEA946";
        dump($hexConverter($hex));
        dump($hexConverterTwo($hex));
        dd();
        dd(hexdec('FEA946'));
        dd(unpack('H*', $hexColor));
        dd(hex2bin($hexColor));
        dd($hexColor);

        dd((string)$hex);
        dd(decbin(4).decbin(6));
        dd(decbin(16689478));
        dd(0xFEA946);
        $a = 2460;
        $b = 9403;
        // 00100110011100
        // 10010010111011
        // 00000010011000
        dump(($a & $b) == bindec('00000010011000'));
        // 00100110011100
        // 10010010111011
        // 10110110111111
        dump(($a | $b) == bindec('10110110111111'));
        // 00100110011100
        // 10010010111011
        // 10110100100111
        dump(($a ^ $b) == bindec('10110100100111'));
        // 00100110011100
        // 10011001110000
        dump(($a << 2) == bindec('10011001110000'));
        // 00100110011100
        // 00001001100111
        dump(($a >> 2) == bindec('00001001100111'));

        dd();
        $a = [0 => "apple", 1 => "banana"];
        $b = [0 => "apple", 1 => "banana"];
        var_dump($a === $b); // True
        $a = [0 => "apple", 1 => "banana"];
        $b = [0 => "apple", "1" => "banana"];
        var_dump($a === $b); // True
        $a = [0 => "apple", 1 => "banana"];
        $b = [1 => "banana", 0 => "apple"];
        var_dump($a === $b); // False
        $a = [1 => 5, 2 => 10];
        $b = [1 => 5, "2" => 10];
        var_dump($a === $b); // True
        $a = [1 => 5, 2 => 10];
        $b = [1 => 5, 2 => "10"];
        var_dump($a === $b); // False
        dd();


        $a = array (0 => 5, 1 => 10);
        $b = array (0 => 5, 1 => "10");
        dd($a === $b);
        $a = [1, 2, 3];
        $b = [3, 2, 1];
        dd($a === $b);
        $a = [1, 2, 3];
        $b = [1, 2, "3"];
        dd($a === $b);
        $a = [1 => 'apples', 2 => 'grapes', 3 => 'oranges'];
        $b = [3 => 'lettuce', 4 => 'potatoes', 5 => 'carrots'];

        dd($a + $b);

        $myFunction = function($first, ...$rest) {
            dump($first);
            foreach ($rest as $var) {
                dump($var);
            }
        };
        $input = ['tweede', 'derde', 'vierde','faz' => 'test'];
        $myFunction('eerst', ...$input);
        $tweede = 'hoi';
        $word = 'lexicon';
        $strings = ['First', 'second' => 'data'];
        echo "Testing my string with $word as input";
        // echo "Testing my string with $wordas input"; // Does not work, $wordas undefined
        echo "Testing my string with {$word}as input"; // Works
        echo "Testing my string with {$strings[0]} als input";
        echo "Testing my string with {$strings['second']} als input";
        echo "Testing my string with {$input['faz']} als input";
        echo "Testing my string with $strings[0] als input";
        // echo "Testing my string with $strings['second'] als input"; // Syntax error

        dd();
        // foreach(...$array) {

        $a = '9D9';
        $b = '9D09';
        dump(++$a);
        dump(++$b);
        dd();
        $a = 'A08';
        dump(++$a);
        dump(++$a);
        dump(++$a);
        dd();
        $a = "9D7";
        dd(++$a);
        dd(++$test);
        $mijnZin = 'hallo daar';
        for($i = 0; $i < 26; $i++) {
            dump(++$mijnZin);
        }
        dd('hier');
        dump(500*1.25*1.30);
        dd(500*1.55);
        $host = 'www.google.com';
        dump(`ping -c 1 {$host}`);
        dd('hoi');
        dump(0e462097431906509019562988736854);
        dump(md5('240610708'));
        dump(md5('QNKCDZO'));
        dd(md5('240610708') == md5('QNKCDZO') ? "equal" : "not equal");
        dd((int)"hallo");
        dd("" == null);
        dd(null == "0");
        dd((true == ""));
        dd(empty(false));
        dd(([]) ? 'if' : 'else');
        dd(gettype(null));
        $test = ['foo' => []];
        $var = $test['foo']['bar']['baz'] ?? $test['foo']['bar']['faz'] ?? 'hoi';
        dd($var);
        dd(true > false);
        dd(intval('a'));
        dump('a' > 10);
        $a = 10;
        $b = 10;
        $a = &$b;
        dump($a);
        dump($b++);
        dump($a);
        dd();
        dd(5 % -3.0);
        echo 10 / 5.0; // Outputs 2.0
        echo intdiv(10, 5.0); // Outputs 2
        dump(10%3.0);
        dd(fmod(10,3.0));
        dump(10/3.333333333);
        dd(intdiv(10,3.3333));
        $a = 5;
        $b = 10;
        $c = 15;
        dd($a = $b = $c);
        $x = false;
        $y = false;
        $z = true;
        dd($x and $y || $z);

        dump(1 && 0);
        dump(false == 0);
        dump(true + 5);
        dd(1 && (0 == 0) + 5);
        $a = 10;
        $b = null;
        $c = 30;
        dump($a ??= $b ??= $c);
        // Will output 10
        $a = null;
        $b = 10;
        $c = 30;
        dump($a ??= $b ??= $c);
        // Will output 10 as well
        dump($a ??= ($b ??= $c));
        // Will output 10 as well
        // Will output 10 as well


        $number = null;
        dd($number ??= 5);
        dd(5*5**2);
        $x = 4;
        // this line might result in unexpected output:
        echo "x minus one equals " . $x-1 . ", or so I hope\n";
        // because it is evaluated like this line (prior to PHP 8.0.0):
        // echo (("x minus one equals " . $x) - 1) . ", or so I hope\n";
        // the desired precedence can be enforced by using parentheses:
        // echo "x minus one equals " . ($x-1) . ", or so I hope\n";
        die();
        dump(0123456);
        dump(1*8**5+2*8**4+3*8**3+4*8**2+5*8**1+6*8**0);

        dd(0.123456e3);
        // dump(0X6BC9);
        // dump(dechex(27593));
        // dd(dechex(6392));

        dump(0x4D2);
        dump( 4*16**2 . " + " . 13*16**1 . " + " . 2*16**0 . " = " . 4*16**2 + 13*16**1 + 2*16**0);
        dump(02426);
        dd();
        dump("10 ^ 2 = " . 10**2);
        dump("10 ^ 1 = " . 10**1);
        dump("10 ^ 0 = " . 10**0);
        dump( 3*5**2 . " + " . 2*5**1 . " + " . 4*5**0 . " = " . 3*5**2 + 2*5**1 + 4*5**0);
        dump( 8*10**1 . " + " . 9*10**0 . " = " . 8*10**1 + 9*10**0);
        dump(02322);
        dump("2 x 8^3 = " . "2 x " . 8**3 . " = " . 2*8**3);
        dump("3 x 8^2 = " . "3 x " . 8**2 . " = " . 3*8**2);
        dump("2 x 8^1 = " . "2 x " . 8**1 . " = " . 2*8**1);
        dump("2 x 8^0 = " . "2 x " . 8**0 . " = " . 2*8**0);

        dump('----');
        dump(0100);
        dump(74**10);


        dd(2*8**3+3*8**2+2*8**1+2*8**0);
        print("hoi");
        dd();
        echo("Hallo");
        dd();
        dd(PHP_MANDIR);
        $appliance = new Appliance("Samsung", "S22 Ultra");
        dd($appliance->getContent());
        dd(APPLIANce::TITLE);
        dd(base_convert(50, 10, 2));
        dump(PHP_INT_MIN);
        dump(PHP_INT_MAX);
        dd(PHP_INT_SIZE);
        echo "test", "mij";
        die();
        dump(APPLIance::TITLE);
        // dump(Appliance::title);
        dd('zo');

        $dateTime = new DaTeTiME();
        iF (iSSeT($dateTime)) {
            dD('hoi');
        }
        dd($dateTIME);
        dd($this->TESTMIJ());
        dd($dateTime);
        VAR_dump('zo');
        dIe();

        dd($this->runDateTime);
        $a = "new string";
        $b = &$a;
        $test = $_GET['sort'] ?? $b ?? $a ?? 'hoi';
        dd($test);
        $a = false;
        $b = $a ?: 'foo';
        echo $b;
        dd('zo');

        $a = 1;
        echo $a++;
        echo '<br />';
        echo $a;
        echo '<br />';
        echo ++$a;
        echo '<br />';
        echo $a--;
        echo '<br />';
        echo $a;
        echo '<br />';
        echo --$a;
        dd('zo');

        $test = '0';
        if (isset($test)) {
            // dd('set');
        }
        if (empty($test)) {
            dd('empty');
        }
        $test = [];
        $test['eerste']['tweede']['derde']['vierde'] = 'vijf';
        if (isset($test['eerste']['tweede']['derde']['vierde'])) {
            dd('ho arry hoii');
        }
        if (! isset($test['zo'])) {
            dd('hoie');
        }
        $test = null;
        if (! isset($test)) {
            dd('nope');
        }
        $a = 'foo';
        $$a['bar'] = 'Murky code';
        assert($$a['bar'] === $foo['bar']);
        dd($foo);
        $pi = pi();
        $indiana = 3.2;
        $epsilon = 0.000001;
        dd(abs(6.5656));
        dd(abs($pi - $indiana));

        if (abs($pi - $indiana) > $epsilon) {
            dd('looks the same');
        } else {
            dd('different');
        }

        dd($pi);
        return $this->render(
            'index.html.twig',
            []
        );
        $olay = new class('olay', 'dede') {
            public function __construct(public string $firstname, public string $lastname) {

            }

            public function __toString(): string
            {
                return "Ik heet $this->firstname $this->lastname";
            }

        };
        echo $olay;
        dump(intdiv(15,6));
        dd(fdiv(15,6));
        echo 0X4D4;
        echo 'hello', 'world';
        dump(strlen('HOI') . ' ' . STRLEN('HOI'));
        die();
        throw new \Exception('TEST');
        $handler = fopen('php://filter/read=string.tolower/resource=../.env', 'r');
        while (feof($handler) !== true) {
            dump(fgets($handler));
        }
        fclose($handler);
        die();
        dump(strlen('België'));
        dump(mb_strlen('België'));
        dd(mb_strlen('Iñtërnâtiônàlizætiøn'));
        foreach (new \DatePeriod(new DateTime('2023-01-01', new \DateTimeZone('Europe/Brussels')), new \DateInterval('P2M'), new DateTime('2023-12-31', new \DateTimeZone('Europe/Brussels'))) as $value) {
            dump($value);
        }
        dd();
        dd(password_hash('testmij', PASSWORD_DEFAULT, ['cost' => 12]));
        //password_verify()
        dd(strncmp('test', 'horoscoop', 1));
        foreach (myGenerator() as $value) {
            echo $value;
        }
        foreach ($this->makeGoodRange(1000000) as $value) {
            echo $value;
        }
        dd(memory_get_peak_usage(false)/1024/1024);
        $object = new class(1,2,3) {
            private int $a = 0;
            public function __construct(public int $x, public int $y, public int $é)
            {

            }
            public function something()
            {
                return $this->a;
            }
        };
        dump($object->something());
        return new Response();
    }
}
