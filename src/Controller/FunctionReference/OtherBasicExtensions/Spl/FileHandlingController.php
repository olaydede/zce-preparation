<?php
namespace App\Controller\FunctionReference\OtherBasicExtensions\Spl;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use function dd;

class FileHandlingController extends AbstractController
{
    #[Route("/spl/spl-file-info", name: "spl-file-info")]
    public function fileInfo(Request $request)
    {
        $fileInfo = new \SplFileInfo("/Users/olaydede/www/education/zce-preparation/www");
        if ($fileInfo->isLink()) {
            dump($fileInfo->getLinkTarget());
        }
        $fileInfo = new \SplFileInfo("../composer.json");
        dd($fileInfo->openFile('r'));
        dd($fileInfo->isWritable());
        dd($fileInfo->isReadable());
        dd($fileInfo->isFile());
        dd($fileInfo->isExecutable());
        dd($fileInfo->isDir());
        dd($fileInfo->getType());
        dd($fileInfo->getSize() / 1024  . 'KB');
        dd(realpath('../composer.json'));
        dump($fileInfo->getPerms());
        dump(sprintf('%o', $fileInfo->getPerms()));
        dd(substr(sprintf('%o', $fileInfo->getPerms()), -4));
        dd($fileInfo->getPathname());
        dd($fileInfo->getPathInfo()->getRealPath());
        dd($fileInfo->getPath());
        dump($fileInfo->getOwner());
        dd(posix_getpwuid($fileInfo->getOwner()));
        dd(date('Y-m-d H:i:s', $fileInfo->getMTime()));
        dd($fileInfo->getInode());
        dd($fileInfo->getGroup());
        dd($fileInfo->getFilename());
        dd($fileInfo->getFileInfo());
        dd($fileInfo->getExtension());
        dd(date('Y-m-d H:i:s', $fileInfo->getCTime()));
        dd($fileInfo->getBasename());
        dd($fileInfo->getATime());
    }

    #[Route("/spl/spl-file-object", name: "spl-file-object")]
    public function fileobject(Request $request)
    {
        $fileObject = new \SplFileObject("../composer.json");
        dd(stat("../composer.json"));
        dd(fstat(fopen("../composer.json", "r+")));
        dd($fileObject->fstat());

        header("Content-Type: application/json");
        header("Content-Length: ".$fileObject->getSize());
        $fileObject->fpassthru();
        dd();
        if (! file_exists("../test.txt")) {
            file_put_contents('../test.txt', 'test');
        }
        $fileObject = new \SplFileObject('../test.txt');
        try {
            unlink($fileObject->getRealPath());
        } catch (\Exception $e) {
            dump($e->getMessage());
        }
        dd('Finished');
        $fileObject->fwrite("Line 1");
        $fileObject->fwrite("Line 2");
        $fileObject = null;
        dd($fileObject);
        $fileObject = new \SplFileObject("../composer.json");
        while (! $fileObject->eof()) {
            dump($fileObject->fgets());
        }
        dd('EOF');
        foreach ($fileObject as $key => $line) {
            dump($fileObject->current());
        }
        dd('hier');
    }
}