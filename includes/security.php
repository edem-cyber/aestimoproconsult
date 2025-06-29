<?php
/**
 * Website Security Protection - Aestimo Pro Consult
 * Multi-layer security system to prevent unauthorized access and downloading
 */

// Start session for tracking
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class WebsiteSecurity
{

    private static $blocked_ips = [];
    private static $suspicious_keywords = [
        'wget',
        'curl',
        'download',
        'extract',
        'copy',
        'mirror',
        'spider',
        'crawl',
        'harvest',
        'grab',
        'suck',
        'offline',
        'httrack',
        'winhttrack'
    ];

    private static $blocked_user_agents = [
        'wget',
        'curl',
        'httrack',
        'winhttrack',
        'webcopier',
        'webcopy',
        'offline explorer',
        'teleport pro',
        'webzip',
        'flashget',
        'mass downloader'
    ];

    /**
     * Initialize security checks
     */
    public static function init()
    {
        self::checkUserAgent();
        self::checkReferer();
        self::checkRequestMethod();
        self::checkSuspiciousParams();
        self::rateLimiting();
        self::generateSecurityToken();
    }

    /**
     * Check for suspicious user agents
     */
    private static function checkUserAgent()
    {
        $user_agent = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');

        foreach (self::$blocked_user_agents as $blocked_agent) {
            if (strpos($user_agent, $blocked_agent) !== false) {
                self::blockAccess('Blocked User Agent: ' . $blocked_agent);
            }
        }

        // Block empty user agents (common with downloaders)
        if (empty($user_agent)) {
            self::blockAccess('Empty User Agent');
        }
    }

    /**
     * Check referer for suspicious activity
     */
    private static function checkReferer()
    {
        $referer = $_SERVER['HTTP_REFERER'] ?? '';
        $host = $_SERVER['HTTP_HOST'] ?? '';

        // Allow direct access and same-origin requests
        if (empty($referer) || strpos($referer, $host) !== false) {
            return;
        }

        // Check for suspicious referers
        $suspicious_referers = ['download', 'mirror', 'copy', 'extract', 'offline'];
        foreach ($suspicious_referers as $suspicious) {
            if (strpos(strtolower($referer), $suspicious) !== false) {
                self::blockAccess('Suspicious Referer');
            }
        }
    }

    /**
     * Check request method
     */
    private static function checkRequestMethod()
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? '';
        $allowed_methods = ['GET', 'POST', 'HEAD'];

        if (!in_array($method, $allowed_methods)) {
            self::blockAccess('Invalid Request Method');
        }
    }

    /**
     * Check for suspicious parameters
     */
    private static function checkSuspiciousParams()
    {
        $all_params = array_merge($_GET, $_POST, $_REQUEST);

        foreach ($all_params as $key => $value) {
            $check_string = strtolower($key . ' ' . $value);

            foreach (self::$suspicious_keywords as $keyword) {
                if (strpos($check_string, $keyword) !== false) {
                    self::blockAccess('Suspicious Parameter: ' . $keyword);
                }
            }
        }
    }

    /**
     * Simple rate limiting
     */
    private static function rateLimiting()
    {
        $ip = self::getClientIP();
        $current_time = time();

        // Check if IP is already blocked
        if (isset($_SESSION['blocked_until'][$ip]) && $_SESSION['blocked_until'][$ip] > $current_time) {
            self::blockAccess('Rate Limited - IP Blocked');
        }

        // Track request count
        if (!isset($_SESSION['request_count'][$ip])) {
            $_SESSION['request_count'][$ip] = [];
        }

        // Clean old requests (older than 5 minutes)
        $_SESSION['request_count'][$ip] = array_filter(
            $_SESSION['request_count'][$ip],
            function ($timestamp) use ($current_time) {
                return ($current_time - $timestamp) < 300; // 5 minutes
            }
        );

        // Add current request
        $_SESSION['request_count'][$ip][] = $current_time;

        // Block if too many requests (more than 50 in 5 minutes)
        if (count($_SESSION['request_count'][$ip]) > 50) {
            $_SESSION['blocked_until'][$ip] = $current_time + 3600; // Block for 1 hour
            self::blockAccess('Rate Limited - Too Many Requests');
        }
    }

    /**
     * Generate security token for forms
     */
    private static function generateSecurityToken()
    {
        if (!isset($_SESSION['security_token'])) {
            $_SESSION['security_token'] = bin2hex(random_bytes(32));
        }
    }

    /**
     * Validate security token
     */
    public static function validateToken($token)
    {
        return isset($_SESSION['security_token']) && hash_equals($_SESSION['security_token'], $token);
    }

    /**
     * Get security token
     */
    public static function getToken()
    {
        return $_SESSION['security_token'] ?? '';
    }

    /**
     * Get client IP address
     */
    private static function getClientIP()
    {
        $ip_keys = ['HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR'];

        foreach ($ip_keys as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip) {
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }

        return $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    }

    /**
     * Block access and log attempt
     */
    private static function blockAccess($reason)
    {
        $ip = self::getClientIP();
        $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
        $request_uri = $_SERVER['REQUEST_URI'] ?? 'Unknown';

        // Log the blocked attempt
        $log_entry = date('Y-m-d H:i:s') . " - BLOCKED: IP=$ip, Reason=$reason, UA=$user_agent, URI=$request_uri\n";
        error_log($log_entry, 3, sys_get_temp_dir() . '/security_blocks.log');

        // Send 403 Forbidden response
        http_response_code(403);
        die('Access Denied');
    }

    /**
     * Obfuscate sensitive content
     */
    public static function obfuscateContent($content)
    {
        // Simple content obfuscation - encode special characters
        return str_replace(
            ['<', '>', '"', "'"],
            ['&lt;', '&gt;', '&quot;', '&#39;'],
            $content
        );
    }

    /**
     * Check if request is from legitimate browser
     */
    public static function isLegitimateRequest()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';

        // Check for common browser signatures
        $legitimate_browsers = [
            'Chrome',
            'Firefox',
            'Safari',
            'Edge',
            'Opera',
            'Mobile'
        ];

        foreach ($legitimate_browsers as $browser) {
            if (strpos($user_agent, $browser) !== false) {
                return true;
            }
        }

        return false;
    }
}

// Initialize security checks
WebsiteSecurity::init();

/**
 * Helper function to get security token for forms
 */
function get_security_token()
{
    return WebsiteSecurity::getToken();
}

/**
 * Helper function to validate security token
 */
function validate_security_token($token)
{
    return WebsiteSecurity::validateToken($token);
}