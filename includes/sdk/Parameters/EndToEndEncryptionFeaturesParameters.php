<?php
class EndToEndEncryptionFeaturesParameters
{
    /**
     * @var bool
     */
    protected $isEnable = false;
    /**
     * @var bool
     */
    protected $includedChatMessages = false;
    /**
     * @var bool
     */
    protected $includedWhiteboard = false;

    public function __construct()
    {
    }

    /**
     * @return bool
     */
    public function isEnable(): bool
    {
        return $this->isEnable;
    }

    /**
     * @param bool $isEnable
     */
    public function setIsEnable(bool $isEnable): void
    {
        $this->isEnable = filter_var($isEnable, FILTER_VALIDATE_BOOLEAN);
    }

    public function isIncludedChatMessages(): bool
    {
        return $this->includedChatMessages;
    }

    public function setIncludedChatMessages(bool $includedChatMessages): void
    {
        $this->includedChatMessages = filter_var($includedChatMessages, FILTER_VALIDATE_BOOLEAN);
    }

    public function isIncludedWhiteboard(): bool
    {
        return $this->includedWhiteboard;
    }

    public function setIncludedWhiteboard(bool $includedWhiteboard): void
    {
        $this->includedWhiteboard = filter_var($includedWhiteboard, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        return array(
            "is_enabled" => $this->isEnable(),
            "included_chat_messages" => $this->isIncludedChatMessages(),
            "included_whiteboard" => $this->isIncludedWhiteboard(),
        );
    }
}
