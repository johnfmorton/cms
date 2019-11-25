<?php
/**
 * @link https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license https://craftcms.github.io/license/
 */

namespace craft\web\assets\admintable;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;
use craft\web\assets\vue\VueAsset;

/**
 * Asset bundle for the Plugin Store page
 */
class AdminTableAsset extends AssetBundle
{
    // Properties
    // =========================================================================

    /**
     * @var bool
     */
    private $useDevServer = true;

    /**
     * @var bool
     */
    private $devServerBaseUrl = 'http://localhost:8082/';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = __DIR__ . '/dist/';

        $this->depends = [
            CpAsset::class,
            VueAsset::class,
        ];

        if ($this->useDevServer) {
            $this->js = [
                $this->devServerBaseUrl.'app.js',
            ];
        } else {
            $this->css = [
                 'chunk-vendors.css',
                 'app.css',
            ];

            $this->js = [
                'chunk-vendors.js',
                'app.js',
            ];
        }

        parent::init();
    }
}