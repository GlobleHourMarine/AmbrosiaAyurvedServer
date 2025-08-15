<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redirector extends CI_Controller {
    public function index($token = null) {
        if (!$token) show_404();

        $target = decrypt_url($token);
        if (!$target) show_404();
        if (preg_match('#^(?:[a-z][a-z0-9+.-]*:)?//#i', $target)) {
            show_error('Invalid target.', 400);
        }

        $target = ltrim($target, '/');

        $separator = (strpos($target, '?') !== false) ? '&' : '?';
        $withToken = $target . $separator . '_t=' . rawurlencode($token);

        redirect($withToken, 'location', 302);
    }
}
