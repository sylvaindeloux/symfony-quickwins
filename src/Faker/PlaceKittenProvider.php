<?PHP

namespace SylvainDeloux\SymfonyQuickwins\Faker;

use Faker\Provider\Base;

class PlaceKittenProvider extends Base
{
    public static function placeKittenUrl(int $width = 640, int $height = 480, bool $randomize = true, bool $gray = false): string
    {
        $baseUrl = 'https://placekitten.com';

        $path = $gray ? '/g' : '';
        $path .= "/{$width}/{$height}";

        return $randomize
            ? $baseUrl . $path . '?random=' . static::randomNumber(5, true)
            : $baseUrl . $path
        ;
    }

    public static function placeKitten(string $dir = null, int $width = 640, int $height = 480, bool $fullPath = true, bool $randomize = true, bool $gray = false): string
    {
        $url = static::placeKittenUrl($width, $height, $randomize, $gray);

        return self::fetchImage($url, $dir, $fullPath);
    }

    private static function fetchImage(string $url = null, string $dir = null, bool $fullPath = true): string
    {
        $dir = $dir === null ? sys_get_temp_dir() : $dir;
        // Validate directory path
        if (!is_dir($dir) || !is_writable($dir)) {
            throw new \InvalidArgumentException(sprintf('Cannot write to directory "%s"', $dir));
        }

        // Generate a random filename. Use the server address so that a file
        // generated at the same time on a different server won't have a collision.
        $name = md5(uniqid(empty($_SERVER['SERVER_ADDR']) ? '' : $_SERVER['SERVER_ADDR'], true));
        $filename = $name .'.jpg';
        $filepath = $dir . DIRECTORY_SEPARATOR . $filename;

        // save file
        if (function_exists('curl_exec')) {
            // use cURL
            $fp = fopen($filepath, 'w');
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $success = curl_exec($ch) && curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200;
            fclose($fp);
            curl_close($ch);

            if (!$success) {
                unlink($filepath);

                // could not contact the distant URL or HTTP error - fail silently.
                return false;
            }
        } elseif (ini_get('allow_url_fopen')) {
            // use remote fopen() via copy()
            $success = copy($url, $filepath);
        } else {
            return new \RuntimeException('The image formatter downloads an image from a remote HTTP server. Therefore, it requires that PHP can request remote hosts, either via cURL or fopen()');
        }

        return $fullPath ? $filepath : $filename;
    }
}
