<?php

namespace SylvainDeloux\SymfonyQuickwins\Storage;

class TmpFileHandler
{
    public function createFromLocalFile(string $path, string $folder = null): TmpFile
    {
        if (!is_readable($path)) {
            throw new \Exception(sprintf('%s is not readable.'));
        }

        return $this->createFromBinaryContent(file_get_contents($path), $folder);
    }

    public function createFromImagick(\Imagick $imagick, string $folder = null): TmpFile
    {
        if (!extension_loaded('imagick')) {
            throw new \Exception('Imagick extension is required.');
        }

        return $this->createFromBinaryContent($imagick->getImageBlob(), $folder);
    }

    public function createFromBinaryContent($binaryContent, string $folder = null): TmpFile
    {
        $folder = $folder ?: sys_get_temp_dir();

        $tmpFile = $this->writeTmpFile($folder, $binaryContent);

        return new TmpFile($tmpFile);
    }

    protected function writeTmpFile(string $path, $binaryContent): string
    {
        if (false === $tmpFile = @tempnam($path, uniqid())) {
            throw new \Exception(sprintf('Unable to create a TmpFile in %s', $path));
        }

        if (false === @file_put_contents($tmpFile, $binaryContent)) {
            throw new \Exception(sprintf('Unable to write data in %s', $tmpFile));
        }

        return $tmpFile;
    }

    public function delete(TmpFile $file)
    {
        $filename = $file->getRealPath();

        if (false === @unlink($filename)) {
            throw new \Exception(sprintf('Unable to delete %s', $filename));
        }
    }
}
