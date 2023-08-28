<?php
/**
 * Admin.
 */

namespace Extendify\Draft;

use Extendify\Config;

/**
 * This class handles any file loading for the admin area.
 */
class Admin
{
    /**
     * The instance
     *
     * @var $instance
     */
    public static $instance = null;

    /**
     * Whether to show the Ask AI button.
     *
     * @var boolean
     */
    public $showDraft = false;

    /**
     * Adds various actions to set up the page
     *
     * @return self|void
     */
    public function __construct()
    {
        if (self::$instance) {
            return self::$instance;
        }

        self::$instance = $this;

        if (!defined('EXTENDIFY_PARTNER_ID')) {
            return;
        }

        $draftData = $this->fetchDraftData();
        if (! $draftData) {
            return;
        }

        $this->showDraft = isset($draftData['showDraft']) ? $draftData['showDraft'] : false;

        $this->loadScripts();
    }

    /**
     * Adds scripts to the admin
     *
     * @return void
     */
    public function loadScripts()
    {
        \add_action(
            'admin_init',
            function () {
                if (!current_user_can(Config::$requiredCapability)) {
                    return;
                }

                // Don't show on Launch pages.
                // phpcs:ignore WordPress.Security.NonceVerification.Recommended
                if (isset($_GET['page']) && $_GET['page'] === 'extendify-launch') {
                    return;
                }

                if (!$this->showDraft) {
                    return;
                }

                add_action( 'enqueue_block_editor_assets', [$this, 'enqueueGutenbergAssets'] );

                $version = Config::$environment === 'PRODUCTION' ? Config::$version : uniqid();

                \wp_enqueue_style(
                    Config::$slug . '-draft-styles',
                    EXTENDIFY_BASE_URL . 'public/build/extendify-draft.css',
                    [],
                    $version,
                    'all'
                );
            }
        );
    }

    /**
     * Fetch the data from the partner-data API endpoint.
     *
     * @return array
     */
    private function fetchDraftData()
    {
        $draftData = get_transient('extendify_draft_data');

        if ($draftData !== false) {
            return $draftData;
        }

        if (!defined('EXTENDIFY_PARTNER_ID')) {
            return [];
        }

        $apiUrl = Config::$config['api']['onboarding'];

        $response = wp_remote_get(
            add_query_arg(
                ['partner' => EXTENDIFY_PARTNER_ID],
                $apiUrl . '/partner-data/'
            ),
            ['headers' => ['Accept' => 'application/json']]
        );

        if (is_wp_error($response)) {
            return [];
        }

        $result = json_decode(wp_remote_retrieve_body($response), true);
        $data = isset($result['data']) ? $result['data'] : [];

        $draftData = [
            'showDraft' => isset($data['showDraft']) ? $data['showDraft'] : false,
        ];

        if (Config::$environment === 'DEVELOPMENT') {
            $draftData['showDraft'] = true;
        }

        set_transient('extendify_draft_data', $draftData, DAY_IN_SECONDS);
        return $draftData;
    }

    /**
     * Enqueues Gutenberg stuff on a non-Gutenberg page.
     *
     * @return void
     */
    public function enqueueGutenbergAssets()
    {
        $currentScreen = get_current_screen();
        // Only load in the post editor.
        if ($currentScreen->base !== 'post') {
            return;
        }

        $version = Config::$environment === 'PRODUCTION' ? Config::$version : uniqid();
        $scriptAssetPath = EXTENDIFY_PATH . 'public/build/extendify-draft.asset.php';
        $fallback = [
            'dependencies' => [],
            'version' => $version,
        ];

        $draftDependencies = file_exists($scriptAssetPath) ? require $scriptAssetPath : $fallback;

        foreach ($draftDependencies['dependencies'] as $style) {
            wp_enqueue_style($style);
        }

        \wp_enqueue_script(
            Config::$slug . '-draft-scripts',
            EXTENDIFY_BASE_URL . 'public/build/extendify-draft.js',
            $draftDependencies['dependencies'],
            $draftDependencies['version'],
            true
        );

        \wp_set_script_translations(Config::$slug . '-draft-scripts', 'extendify');
    }
}
