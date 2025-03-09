<?php
class ExternalMediaPlayerFeaturesParameters
{
    /**
     * @var bool
     */
    protected $allowedExternalMediaPlayer = true;

    public function __construct()
    {
    }

    /**
     * @return bool
     */
    public function isAllowedExternalMediaPlayer(): bool
    {
        return $this->allowedExternalMediaPlayer;
    }

    /**
     * @param bool $allowedExternalMediaPlayer
     */
    public function setAllowedExternalMediaPlayer(bool $allowedExternalMediaPlayer): void
    {
        $this->allowedExternalMediaPlayer = filter_var($allowedExternalMediaPlayer, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        return array(
            "allowed_external_media_player" => $this->isAllowedExternalMediaPlayer(),
        );
    }
}
