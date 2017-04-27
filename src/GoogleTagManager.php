<?php

namespace Spatie\GoogleTagManager;

use Illuminate\Support\Traits\Macroable;

class GoogleTagManager
{
    use Macroable;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var bool
     */
    protected $enabled;

    /**
     * @var bool
     */
    protected $environmentEnabled;

    /**
     * @var \Spatie\GoogleTagManager\DataLayer
     */
    protected $dataLayer;

    /**
     * @var \Spatie\GoogleTagManager\DataLayer
     */
    protected $flashDataLayer;

    /**
     * @var \Illuminate\Support\Collection
     */
    protected $pushDataLayer;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
        $this->dataLayer = new DataLayer();
        $this->flashDataLayer = new DataLayer();
        $this->pushDataLayer = new \Illuminate\Support\Collection();

        $this->enabled = true;
        $this->environmentEnabled = false;
        $this->gtmAuth = '';
        $this->gtmPreview = '';
        $this->gtmCookiesWin = '';
    }

    /**
     * Return the Google Tag Manager id.
     *
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Check whether script rendering is enabled.
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Enable Google Tag Manager scripts rendering.
     */
    public function enable()
    {
        $this->enabled = true;
    }

    /**
     * Disable Google Tag Manager scripts rendering.
     */
    public function disable()
    {
        $this->enabled = false;
    }

    /**
     * Check whether environment usage is enabled.
     *
     * @return bool
     */
    public function isEnvironmentEnabled()
    {
        return $this->environmentEnabled;
    }

    /**
     * @return string
     */
    public function getGtmAuth()
    {
        return $this->gtmAuth;
    }

    /**
     * @return string
     */
    public function getGtmPreview()
    {
        return $this->gtmPreview;
    }

    /**
     * @return string
     */
    public function getGtmCookiesWin()
    {
        return $this->gtmCookiesWin;
    }

    /**
     * Enable Google Tag Manager environment usage.
     *
     * @param $gtmAuth
     * @param $gtmPreview
     * @param $gtmCookiesWin
     */
    public function enableEnvironment($gtmAuth, $gtmPreview, $gtmCookiesWin)
    {
        $this->environmentEnabled = true;
        $this->gtmAuth = $gtmAuth;
        $this->gtmPreview = $gtmPreview;
        $this->gtmCookiesWin = $gtmCookiesWin;
    }

    /**
     * Disable Google Tag Manager environment usage.
     */
    public function disableEnvironment()
    {
        $this->environmentEnabled = false;
    }

    /**
     * Add data to the data layer.
     *
     * @param array|string $key
     * @param mixed        $value
     */
    public function set($key, $value = null)
    {
        $this->dataLayer->set($key, $value);
    }

    /**
     * Retrieve the data layer.
     *
     * @return \Spatie\GoogleTagManager\DataLayer
     */
    public function getDataLayer()
    {
        return $this->dataLayer;
    }

    /**
     * Add data to the data layer for the next request.
     *
     * @param array|string $key
     * @param mixed        $value
     */
    public function flash($key, $value = null)
    {
        $this->flashDataLayer->set($key, $value);
    }

    /**
     * Retrieve the data layer's data for the next request.
     *
     * @return array
     */
    public function getFlashData()
    {
        return $this->flashDataLayer->toArray();
    }

    /**
     * Add data to be pushed to the data layer.
     *
     * @param array|string $key
     * @param mixed        $value
     */
    public function push($key, $value = null)
    {
        $pushItem = new DataLayer();
        $pushItem->set($key, $value);
        $this->pushDataLayer->push($pushItem);
    }

    /**
     * Retrieve the data layer's data for the next request.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getPushData()
    {
        return $this->pushDataLayer;
    }

    /**
     * Clear the data layer.
     */
    public function clear()
    {
        $this->dataLayer = new DataLayer();
        $this->pushDataLayer = new \Illuminate\Support\Collection();
    }

    /**
     * Utility function to dump an array as json.
     *
     * @param  array $data
     * @return string
     */
    public function dump($data)
    {
        return (new DataLayer($data))->toJson();
    }
}
