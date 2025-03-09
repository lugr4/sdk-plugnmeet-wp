<?php

/**
 *
 */
class LockSettingsParameters
{
    /**
     * @var bool
     */
    protected $lockMicrophone;
    /**
     * @var bool
     */
    protected $lockWebcam;
    /**
     * @var bool
     */
    protected $lockScreenSharing;
    /**
     * @var bool
     */
    protected $lockWhiteboard;
    /**
     * @var bool
     */
    protected $lockSharedNotepad;
    /**
     * @var bool
     */
    protected $lockChat;
    /**
     * @var bool
     */
    protected $lockChatSendMessage;
    /**
     * @var bool
     */
    protected $lockChatFileShare;
    /**
     * @var bool
     */
    protected $lockPrivateChat;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @return bool
     */
    public function isLockMicrophone(): bool
    {
        return $this->lockMicrophone;
    }

    /**
     * @param bool $lockMicrophone
     */
    public function setLockMicrophone(bool $lockMicrophone)
    {
        $this->lockMicrophone = filter_var($lockMicrophone, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return bool
     */
    public function isLockWebcam(): bool
    {
        return $this->lockWebcam;
    }

    /**
     * @param bool $lockWebcam
     */
    public function setLockWebcam(bool $lockWebcam)
    {
        $this->lockWebcam = filter_var($lockWebcam, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return bool
     */
    public function isLockScreenSharing(): bool
    {
        return $this->lockScreenSharing;
    }

    /**
     * @param bool $lockScreenSharing
     */
    public function setLockScreenSharing(bool $lockScreenSharing)
    {
        $this->lockScreenSharing = filter_var($lockScreenSharing, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return bool
     */
    public function isLockWhiteboard(): bool
    {
        return $this->lockWhiteboard;
    }

    /**
     * @param bool $lockWhiteboard
     */
    public function setLockWhiteboard(bool $lockWhiteboard): void
    {
        $this->lockWhiteboard = $lockWhiteboard;
    }

    /**
     * @return bool
     */
    public function isLockSharedNotepad(): bool
    {
        return $this->lockSharedNotepad;
    }

    /**
     * @param bool $lockSharedNotepad
     */
    public function setLockSharedNotepad(bool $lockSharedNotepad): void
    {
        $this->lockSharedNotepad = $lockSharedNotepad;
    }

    /**
     * @return bool
     */
    public function isLockChat(): bool
    {
        return $this->lockChat;
    }

    /**
     * @param bool $lockChat
     */
    public function setLockChat(bool $lockChat)
    {
        $this->lockChat = filter_var($lockChat, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return bool
     */
    public function isLockChatSendMessage(): bool
    {
        return $this->lockChatSendMessage;
    }

    /**
     * @param bool $lockChatSendMessage
     */
    public function setLockChatSendMessage(bool $lockChatSendMessage)
    {
        $this->lockChatSendMessage = filter_var($lockChatSendMessage, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return bool
     */
    public function isLockChatFileShare(): bool
    {
        return $this->lockChatFileShare;
    }

    /**
     * @param bool $lockChatFileShare
     */
    public function setLockChatFileShare(bool $lockChatFileShare)
    {
        $this->lockChatFileShare = filter_var($lockChatFileShare, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return bool
     */
    public function isLockPrivateChat(): bool
    {
        return $this->lockPrivateChat;
    }

    /**
     * @param bool $lockPrivateChat
     */
    public function setLockPrivateChat(bool $lockPrivateChat): void
    {
        $this->lockPrivateChat = filter_var($lockPrivateChat, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        $body = array();

        if ($this->lockMicrophone !== null) {
            $body["lock_microphone"] = $this->isLockMicrophone();
        }
        if ($this->lockWebcam !== null) {
            $body["lock_webcam"] = $this->isLockWebcam();
        }
        if ($this->lockScreenSharing !== null) {
            $body["lock_screen_sharing"] = $this->isLockScreenSharing();
        }
        if ($this->lockWhiteboard !== null) {
            $body["lock_whiteboard"] = $this->isLockWhiteboard();
        }
        if ($this->lockSharedNotepad !== null) {
            $body["lock_shared_notepad"] = $this->isLockSharedNotepad();
        }
        if ($this->lockChat !== null) {
            $body["lock_chat"] = $this->isLockChat();
        }
        if ($this->lockChatSendMessage !== null) {
            $body["lock_chat_send_message"] = $this->isLockChatSendMessage();
        }
        if ($this->lockChatFileShare !== null) {
            $body["lock_chat_file_share"] = $this->isLockChatFileShare();
        }
        if ($this->lockPrivateChat !== null) {
            $body["lock_private_chat"] = $this->isLockPrivateChat();
        }

        return $body;
    }
}
