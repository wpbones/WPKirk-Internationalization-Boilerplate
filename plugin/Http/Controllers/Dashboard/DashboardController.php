<?php

namespace WPKirk\Http\Controllers\Dashboard;

use WPKirk\Http\Controllers\Controller;

if (!defined('ABSPATH')) {
  exit();
}

class DashboardController extends Controller
{
  public function index()
  {
    return WPKirk()->view('dashboard.index')
      ->withAdminAppsScript('app');
  }

  public function second()
  {
    $localization_data = array(
      'greeting' => __('Hello, World! The jQuery version is', 'wp-kirk'),
    );

    return WPKirk()->view('dashboard.second')
      ->withAdminScript('wp-kirk-main')
      ->withLocalizeScript('wp-kirk-main', 'wpKirkLanguages', $localization_data);
  }
}
