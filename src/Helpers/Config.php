<?php
declare(strict_types = 1); //php is not strictly typed but this sets it to be 

namespace Philipowusuasare\BugReport\Helpers;

class Config {

    public static function get(string $filename, string $key = null)
    {
        $fileContent = self::getFileContent($filename);
        if($key === null) {
            return $fileContent;
        }

        return isset($fileContent[$key]) ? $fileContent[$key] : [];
    }

    public static function getFileContent(string $filename): array 
    {
        $fileContent = [];
        try {
            $path = realpath(sprintf(__DIR__ . '/../Configs/%s.php', $filename));
            if(file_exists($path)) {
                $fileContent = require $path;
            }
        } catch (\Throwable $exception) {
            // die($exception->getMessage());
            throw new \RuntimeException(
                sprintf('The specified file: %s was not found', $filename)
            );
        }
        return $fileContent;
    }
}