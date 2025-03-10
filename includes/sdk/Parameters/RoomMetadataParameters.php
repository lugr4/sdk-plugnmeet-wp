<?php
/**
 *
 */
class RoomMetadataParameters
{
    /**
     * @var string
     */
    protected $roomTitle;
    /**
     * @var string
     */
    protected $welcomeMessage;
    /**
     * @var string
     */
    protected $webhookUrl;
    /**
     * @var string
     */
    protected $logoutUrl;
    /**
     * @var RoomFeaturesParameters
     */
    protected $features;

    /**
     * @var LockSettingsParameters
     */
    protected $defaultLockSettings;
    /**
     * @var CopyrightConfParameters
     */
    protected $copyrightConf;
    /**
     * @var string
     */
    protected $extraData;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getRoomTitle(): string
    {
        return $this->roomTitle;
    }

    /**
     * @param string $roomTitle
     */
    public function setRoomTitle(string $roomTitle)
    {
        $this->roomTitle = $roomTitle;
    }

    /**
     * @return string
     */
    public function getWelcomeMessage(): string
    {
        return $this->welcomeMessage;
    }

    /**
     * @param string $welcomeMessage
     */
    public function setWelcomeMessage(string $welcomeMessage): void
    {
        $this->welcomeMessage = $welcomeMessage;
    }

    /**
     * @return string
     */
    public function getWebhookUrl(): string
    {
        return $this->webhookUrl;
    }

    /**
     * @param string $webhookUrl
     */
    public function setWebhookUrl(string $webhookUrl)
    {
        $this->webhookUrl = $webhookUrl;
    }

    /**
     * @return string
     */
    public function getLogoutUrl(): string
    {
        return $this->logoutUrl;
    }

    /**
     * @param string $logoutUrl
     */
    public function setLogoutUrl(string $logoutUrl): void
    {
        $this->logoutUrl = $logoutUrl;
    }

    /**
     * @return RoomFeaturesParameters
     */
    public function getFeatures(): RoomFeaturesParameters
    {
        return $this->features;
    }

    /**
     * @param RoomFeaturesParameters $features
     */
    public function setFeatures(RoomFeaturesParameters $features)
    {
        $this->features = $features;
    }

    /**
     * @return LockSettingsParameters
     */
    public function getDefaultLockSettings(): LockSettingsParameters
    {
        return $this->defaultLockSettings;
    }

    /**
     * @param LockSettingsParameters $defaultLockSettings
     */
    public function setDefaultLockSettings(LockSettingsParameters $defaultLockSettings): void
    {
        $this->defaultLockSettings = $defaultLockSettings;
    }

    /**
     * @return CopyrightConfParameters
     */
    public function getCopyrightConf(): CopyrightConfParameters
    {
        return $this->copyrightConf;
    }

    /**
     * @param CopyrightConfParameters $copyrightConf
     * @return void
     */
    public function setCopyrightConf(CopyrightConfParameters $copyrightConf): void
    {
        $this->copyrightConf = $copyrightConf;
    }

    /**
     * @return string
     */
    public function getExtraData(): string
    {
        return $this->extraData;
    }

    /**
     * @param string $extraData
     */
    public function setExtraData(string $extraData): void
    {
        $this->extraData = $extraData;
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        $body = array(
            "room_title" => $this->getRoomTitle(),
        );

        if (!empty($this->welcomeMessage)) {
            $body["welcome_message"] = $this->getWelcomeMessage();
        }

        if (!empty($this->webhookUrl)) {
            $body["webhook_url"] = $this->getWebhookUrl();
        }

        if (!empty($this->logoutUrl)) {
            $body["logout_url"] = $this->getLogoutUrl();
        }

        if ($this->features !== null) {
            $body["room_features"] = $this->getFeatures()->buildBody();
        }

        if ($this->defaultLockSettings !== null) {
            $body["default_lock_settings"] = $this->getDefaultLockSettings()->buildBody();
        }

        if ($this->copyrightConf !== null) {
            $body["copyright_conf"] = $this->getCopyrightConf()->buildBody();
        }

        if (!empty($this->extraData)) {
            $body["extra_data"] = $this->getExtraData();
        }

        return $body;
    }
}
