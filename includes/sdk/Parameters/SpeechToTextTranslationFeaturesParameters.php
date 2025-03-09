<?php
class SpeechToTextTranslationFeaturesParameters
{
    /**
     * @var bool
     */
    protected $isAllow = true;
    /**
     * @var bool
     */
    protected $isAllowTranslation = true;

    public function __construct()
    {
    }

    /**
     * @return bool
     */
    public function isAllow(): bool
    {
        return $this->isAllow;
    }

    /**
     * @param bool $isAllow
     */
    public function setIsAllow(bool $isAllow): void
    {
        $this->isAllow = filter_var($isAllow, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return bool
     */
    public function isAllowTranslation(): bool
    {
        return $this->isAllowTranslation;
    }

    /**
     * @param bool $isAllowTranslation
     */
    public function setIsAllowTranslation(bool $isAllowTranslation): void
    {
        $this->isAllowTranslation = filter_var($isAllowTranslation, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        return array(
            "is_allow" => $this->isAllow(),
            "is_allow_translation" => $this->isAllowTranslation()
        );
    }
}
