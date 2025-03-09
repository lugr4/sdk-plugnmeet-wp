<?php

/**
 *
 */
class UserMetadataParameters
{
    /**
     * @var string
     */
    protected $profilePic;
    /**
     * @var bool
     */
    protected $recordWebcam = true;
    /**
     * @var string
     */
    protected $preferredLang = null;
    /**
     * @var LockSettingsParameters
     */
    protected $lockSettings;
    /**
     * @var string
     */
    protected $extraData;
    /**
     * @var string
     */
    protected $exUserId;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getProfilePic(): string
    {
        return $this->profilePic;
    }

    /**
     * @param string $profilePic
     */
    public function setProfilePic(string $profilePic)
    {
        $this->profilePic = $profilePic;
    }

    /**
     * @return bool
     */
    public function isRecordWebcam(): bool
    {
        return $this->recordWebcam;
    }

    /**
     * @param bool $recordWebcam
     */
    public function setRecordWebcam(bool $recordWebcam): void
    {
        $this->recordWebcam = filter_var($recordWebcam, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return string|null
     */
    public function getPreferredLang(): ?string
    {
        return $this->preferredLang;
    }

    /**
     * @param string $preferredLang
     * For list of values please check:
     * https://github.com/mynaparrot/plugNmeet-client/blob/main/src/helpers/languages.ts
     * The value should be indicated as `code` in the above file
     * example: es-ES Or bn-BD etc
     * @return void
     */
    public function setPreferredLang(string $preferredLang): void
    {
        if (!empty($preferredLang)) {
            $this->preferredLang = $preferredLang;
        }
    }

    /**
     * @return LockSettingsParameters
     */
    public function getLockSettings(): LockSettingsParameters
    {
        return $this->lockSettings;
    }

    /**
     * @param LockSettingsParameters $lockSettings
     */
    public function setLockSettings(LockSettingsParameters $lockSettings)
    {
        $this->lockSettings = $lockSettings;
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
     * @return string
     */
    public function getExUserId(): string
    {
        return $this->exUserId;
    }

    /**
     * @param string $exUserId
     * @return void
     */
    public function setExUserId(string $exUserId): void
    {
        $this->exUserId = $exUserId;
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        $body = array(
            "record_webcam" => $this->isRecordWebcam()
        );

        if (!empty($this->profilePic)) {
            $body["profile_pic"] = $this->getProfilePic();
        }

        if (!empty($this->preferredLang)) {
            $body["preferred_lang"] = $this->getPreferredLang();
        }

        if ($this->lockSettings !== null) {
            $body["lock_settings"] = $this->getLockSettings()->buildBody();
        }

        if (!empty($this->extraData)) {
            $body["extra_data"] = $this->getExtraData();
        }

        if (!empty($this->exUserId)) {
            $body["ex_user_id"] = $this->getExUserId();
        }

        return $body;
    }
}
