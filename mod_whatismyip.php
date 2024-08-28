<?php
/**
 * @package    Mod_Whatismyip
 * @author     Rinenweb <info@rinenweb.eu>
 * @license    GNU General Public License v3
 * @link       https://www.rinenweb.eu
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;

class ModWhatIsMyIPHelper
{
    public static function getIP()
    {
        $app = Factory::getApplication();

        if ($app->input->server->getString('HTTP_CLIENT_IP')) {
            $ip = $app->input->server->getString('HTTP_CLIENT_IP');
        } elseif ($app->input->server->getString('HTTP_X_FORWARDED_FOR')) {
            $ip = $app->input->server->getString('HTTP_X_FORWARDED_FOR');
        } else {
            $ip = $app->input->server->getString('REMOTE_ADDR', 'UNKNOWN');
        }

        return $ip;
    }
}

// Usage
$introtext = $params->get('Greeting');
$content = $introtext . " " . ModWhatIsMyIPHelper::getIP();

echo $content;