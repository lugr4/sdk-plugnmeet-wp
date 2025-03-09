<?php

/**
 *
 */
class ChatFeaturesParameters
{
    /**
     * @var bool
     */
    protected $allowChat = true;
    /**
     * @var bool
     */
    protected $allowFileUpload = true;
    /**
     * @var string[]
     */
    protected $allowedFileTypes = array();
    /**
     * @var int
     */
    protected $maxFileSize = 0;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @return bool
     */
    public function isAllowChat(): bool
    {
        return $this->allowChat;
    }

    /**
     * @param bool $allowChat
     */
    public function setAllowChat(bool $allowChat)
    {
        $this->allowChat = filter_var($allowChat, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return bool
     */
    public function isAllowFileUpload(): bool
    {
        return $this->allowFileUpload;
    }

    /**
     * @param bool $allowFileUpload
     */
    public function setAllowFileUpload(bool $allowFileUpload)
    {
        $this->allowFileUpload = filter_var($allowFileUpload, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return string[]
     */
    public function getAllowedFileTypes(): array
    {
        return $this->allowedFileTypes;
    }

    /**
     * @param string[] $allowedFileTypes
     */
    public function setAllowedFileTypes(array $allowedFileTypes)
    {
        $this->allowedFileTypes = $allowedFileTypes;
    }

    /**
     * @return int
     */
    public function getMaxFileSize(): int
    {
        return $this->maxFileSize;
    }

    /**
     * @param int $maxFileSize
     */
    public function setMaxFileSize(int $maxFileSize)
    {
        $this->maxFileSize = $maxFileSize;
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        $body = array(
            "allow_chat" => $this->isAllowChat(),
            "allow_file_upload" => $this->isAllowFileUpload()
        );

        if (!empty($this->allowedFileTypes)) {
            $body['allowed_file_types'] = $this->getAllowedFileTypes();
        }

        if ($this->maxFileSize > 0) {
            $body['max_file_size'] = $this->getMaxFileSize();
        }

        return $body;
    }
}
