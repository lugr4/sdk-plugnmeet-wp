<?php

/**
 *
 */
class GenerateJoinTokenParameters
{
    /**
     * @var string
     */
    protected $roomId;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $userId;
    /**
     * @var bool
     */
    protected $isAdmin = false;
    /**
     * @var bool
     */
    protected $isHidden = false;

    /**
     * @var UserMetadataParameters
     */
    protected $userMetadata = null;

    /**
     * @var LockSettingsParameters
     */
    protected $lockSettings = null;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getRoomId(): string
    {
        return $this->roomId;
    }

    /**
     * @param string $roomId
     */
    public function setRoomId(string $roomId)
    {
        $this->roomId = $roomId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    /**
     * @param bool $isAdmin
     */
    public function setIsAdmin(bool $isAdmin)
    {
        $this->isAdmin = filter_var($isAdmin, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->isHidden;
    }

    /**
     * @param bool $isHidden
     */
    public function setIsHidden(bool $isHidden)
    {
        $this->isHidden = filter_var($isHidden, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return UserMetadataParameters
     */
    public function getUserMetadata(): UserMetadataParameters
    {
        return $this->userMetadata;
    }

    /**
     * @param UserMetadataParameters $userMetadata
     */
    public function setUserMetadata(UserMetadataParameters $userMetadata)
    {
        $this->userMetadata = $userMetadata;
    }

    public function getLockSettings(): LockSettingsParameters
    {
        return $this->lockSettings;
    }

    public function setLockSettings(LockSettingsParameters $lockSettings): void
    {
        $this->lockSettings = $lockSettings;
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        $body = array(
            "room_id" => $this->getRoomId(),
            "user_info" => array(
                "name" => $this->getName(),
                "user_id" => $this->getUserId(),
                "is_admin" => $this->isAdmin(),
                "is_hidden" => $this->isHidden()
            )
        );

        if ($this->userMetadata !== null) {
            $body["user_info"]["user_metadata"] = $this->getUserMetadata()->buildBody();
            if ($this->lockSettings !== null) {
                $body["user_info"]["user_metadata"]["lock_settings"] = $this->getLockSettings()->buildBody();
            }
        }

        return $body;
    }
}
