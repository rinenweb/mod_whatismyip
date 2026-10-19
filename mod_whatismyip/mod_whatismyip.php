<?php
/**
 * @package    Mod_Whatismyip
 * @author     Rinenweb <info@rinenweb.eu>
 * @license    GNU General Public License v3
 * @link       https://www.rinenweb.eu
 */

defined('_JEXEC') or die;

use Joomla\Utilities\IpHelper;

// IpHelper uses REMOTE_ADDR, and only trusts X-Forwarded-For / Client-IP headers
// when "Behind Load Balancer" is enabled in Global Configuration.
$ip = IpHelper::getIp();

if (!filter_var($ip, FILTER_VALIDATE_IP)) {
    $ip = 'UNKNOWN';
}

$greeting = (string) $params->get('greeting', 'Your IP address is:');

echo '<p class="mod-whatismyip">'
    . htmlspecialchars($greeting, ENT_QUOTES, 'UTF-8') . ' '
    . '<span class="mod-whatismyip__ip">' . htmlspecialchars($ip, ENT_QUOTES, 'UTF-8') . '</span>'
    . '</p>';
