<?php
/**
 *
 */
class plugNmeetConnect
{
    /**
     * @var PlugNmeet
     */
    protected PlugNmeet $plugnmeet;

    /**
     * 
     */
    public function __construct()
    {
        $this->plugnmeet = new PlugNmeet();
    }

    /**
     * @return PlugNmeet
     */
    public function getPlugnmeet(): PlugNmeet
    {
        return $this->plugnmeet;
    }

    /**
     * @return string
     */
    public function getUUID(): string
    {
        return $this->plugnmeet->getUUID();
    }

    /**
     * Generate UUID v4 random string
     *
     * @return string
     */
    public static function generateUuid4(): string
    {
        return PlugNmeet::generateUuid4();
    }

    /**
     * @param string $roomId
     * @return IsRoomActiveResponse
     */
    public function isRoomActive(string $roomId): IsRoomActiveResponse
    {
        $isRoomActiveParameters = new IsRoomActiveParameters();
        $isRoomActiveParameters->setRoomId($roomId);

        return $this->plugnmeet->isRoomActive($isRoomActiveParameters);
    }

    /**
     * @param string $roomId
     * @param string $roomTitle
     * @param string $welcomeMessage
     * @param int $max_participants
     * @param string $webHookUrl
     * @param array $roomMetadata
     * @param int $empty_timeout
     * @param string $logoutUrl
     * @param string|null $extraData
     * @return CreateRoomResponse
     */
    public function createRoom(string $roomId, string $roomTitle, string $welcomeMessage, int $max_participants, string $webHookUrl, array $roomMetadata, int $empty_timeout = 0, string $logoutUrl = "", string $extraData = null)
    {
        $roomFeatures = $roomMetadata['room_features'];
        $features = new RoomFeaturesParameters();

        if (isset($roomFeatures['allow_webcams'])) {
            $features->setAllowWebcams($roomFeatures['allow_webcams']);
        }
        if (isset($roomFeatures['mute_on_start'])) {
            $features->setMuteOnStart($roomFeatures['mute_on_start']);
        }
        if (isset($roomFeatures['allow_screen_share'])) {
            $features->setAllowScreenShare($roomFeatures['allow_screen_share']);
        }
        if (isset($roomFeatures['allow_rtmp'])) {
            $features->setAllowRTMP($roomFeatures['allow_rtmp']);
        }
        if (isset($roomFeatures['allow_view_other_webcams'])) {
            $features->setAllowViewOtherWebcams($roomFeatures['allow_view_other_webcams']);
        }
        if (isset($roomFeatures['allow_view_other_users_list'])) {
            $features->setAllowViewOtherParticipants($roomFeatures['allow_view_other_users_list']);
        }
        if (isset($roomFeatures['admin_only_webcams'])) {
            $features->setAdminOnlyWebcams($roomFeatures['admin_only_webcams']);
        }
        if (isset($roomFeatures['allow_polls'])) {
            $features->setAllowPolls($roomFeatures['allow_polls']);
        }
        if (isset($roomFeatures['room_duration']) && $roomFeatures['room_duration'] > 0) {
            $features->setRoomDuration($roomFeatures['room_duration']);
        }
        if (isset($roomFeatures['enable_analytics'])) {
            $features->setEnableAnalytics($roomFeatures['enable_analytics']);
        }
        if (isset($roomFeatures['allow_virtual_bg'])) {
            $features->setAllowVirtualBg($roomFeatures['allow_virtual_bg']);
        }
        if (isset($roomFeatures['allow_raise_hand'])) {
            $features->setAllowRaiseHand($roomFeatures['allow_raise_hand']);
        }
        if (isset($roomFeatures['auto_gen_user_id'])) {
            $features->setAutoGenUserId($roomFeatures['auto_gen_user_id']);
        }

        if (isset($roomMetadata['recording_features'])) {
            $roomRecordingFeatures = $roomMetadata['recording_features'];
            $recordingFeatures = new RecordingFeaturesParameters();
            if (isset($roomRecordingFeatures['is_allow'])) {
                $recordingFeatures->setIsAllow($roomRecordingFeatures['is_allow']);
            }
            if (isset($roomRecordingFeatures['is_allow_cloud'])) {
                $recordingFeatures->setIsAllowCloud($roomRecordingFeatures['is_allow_cloud']);
            }
            if (isset($roomRecordingFeatures['is_allow_local'])) {
                $recordingFeatures->setIsAllowLocal($roomRecordingFeatures['is_allow_local']);
            }
            if (isset($roomRecordingFeatures['enable_auto_cloud_recording'])) {
                $recordingFeatures->setEnableAutoCloudRecording($roomRecordingFeatures['enable_auto_cloud_recording']);
            }
            if (isset($roomRecordingFeatures['only_record_admin_webcams'])) {
                $recordingFeatures->setOnlyRecordAdminWebcams($roomRecordingFeatures['only_record_admin_webcams']);
            }
            $features->setRecordingFeatures($recordingFeatures);
        }

        if (isset($roomMetadata['chat_features'])) {
            $roomChatFeatures = $roomMetadata['chat_features'];
            $chatFeatures = new ChatFeaturesParameters();
            if (isset($roomChatFeatures['allow_chat'])) {
                $chatFeatures->setAllowChat($roomChatFeatures['allow_chat']);
            }
            if (isset($roomChatFeatures['allow_file_upload'])) {
                $chatFeatures->setAllowFileUpload($roomChatFeatures['allow_file_upload']);
            }
            $features->setChatFeatures($chatFeatures);
        }

        if (isset($roomMetadata['shared_note_pad_features'])) {
            $roomSharedNotepadFeatures = $roomMetadata['shared_note_pad_features'];
            $sharedNotePadFeatures = new SharedNotePadFeaturesParameters();
            if (isset($roomSharedNotepadFeatures['allowed_shared_note_pad'])) {
                $sharedNotePadFeatures->setAllowedSharedNotePad($roomSharedNotepadFeatures['allowed_shared_note_pad']);
            }
            $features->setSharedNotePadFeatures($sharedNotePadFeatures);
        }

        if (isset($roomMetadata['whiteboard_features'])) {
            $roomWhiteboardFeatures = $roomMetadata['whiteboard_features'];
            $whiteboardFeatures = new WhiteboardFeaturesParameters();
            if (isset($roomWhiteboardFeatures['allowed_whiteboard'])) {
                $whiteboardFeatures->setAllowedWhiteboard($roomWhiteboardFeatures['allowed_whiteboard']);
            }
            if (isset($roomWhiteboardFeatures['preload_file'])) {
                $whiteboardFeatures->setPreloadFile($roomWhiteboardFeatures['preload_file']);
            }
            $features->setWhiteboardFeatures($whiteboardFeatures);
        }

        if (isset($roomMetadata['external_media_player_features'])) {
            $roomExternalMediaPlayerFeatures = $roomMetadata['external_media_player_features'];
            $externalMediaPlayerFeatures = new ExternalMediaPlayerFeaturesParameters();
            if (isset($roomExternalMediaPlayerFeatures['allowed_external_media_player'])) {
                $externalMediaPlayerFeatures->setAllowedExternalMediaPlayer($roomExternalMediaPlayerFeatures['allowed_external_media_player']);
            }
            $features->setExternalMediaPlayerFeatures($externalMediaPlayerFeatures);
        }

        if (isset($roomMetadata['waiting_room_features'])) {
            $roomWaitingRoomFeatures = $roomMetadata['waiting_room_features'];
            $waitingRoomFeatures = new WaitingRoomFeaturesParameters();
            if (isset($roomWaitingRoomFeatures['is_active'])) {
                $waitingRoomFeatures->setIsActive($roomWaitingRoomFeatures['is_active']);
            }
            if (!empty($roomWaitingRoomFeatures['waiting_room_msg'])) {
                $waitingRoomFeatures->setWaitingRoomMsg($roomWaitingRoomFeatures['waiting_room_msg']);
            }
            $features->setWaitingRoomFeatures($waitingRoomFeatures);
        }

        if (isset($roomMetadata['breakout_room_features'])) {
            $roomBreakoutRoomFeatures = $roomMetadata['breakout_room_features'];
            $breakoutRoomFeatures = new BreakoutRoomFeaturesParameters();
            if (isset($roomBreakoutRoomFeatures['is_allow'])) {
                $breakoutRoomFeatures->setIsAllow($roomBreakoutRoomFeatures['is_allow']);
            }
            if (isset($roomBreakoutRoomFeatures['allowed_number_rooms'])) {
                $breakoutRoomFeatures->setAllowedNumberRooms((int)$roomBreakoutRoomFeatures['allowed_number_rooms']);
            }
            $features->setBreakoutRoomFeatures($breakoutRoomFeatures);
        }

        if (isset($roomMetadata['display_external_link_features'])) {
            $roomDisplayExternalLinkFeatures = $roomMetadata['display_external_link_features'];
            $displayExternalLinkFeatures = new DisplayExternalLinkFeaturesParameters();
            if (isset($roomDisplayExternalLinkFeatures['is_allow'])) {
                $displayExternalLinkFeatures->setIsAllow($roomDisplayExternalLinkFeatures['is_allow']);
            }
            $features->setDisplayExternalLinkFeatures($displayExternalLinkFeatures);
        }

        if (isset($roomMetadata['ingress_features'])) {
            $roomIngressFeatures = $roomMetadata['ingress_features'];
            $ingressFeatures = new IngressFeaturesParameters();
            if (isset($roomIngressFeatures['is_allow'])) {
                $ingressFeatures->setIsAllow($roomIngressFeatures['is_allow']);
            }
            $features->setIngressFeatures($ingressFeatures);
        }

        if (isset($roomMetadata['speech_to_text_translation_features'])) {
            $roomSpeechToTextTranslationFeatures = $roomMetadata['speech_to_text_translation_features'];
            $speechToTextTranslationFeatures = new SpeechToTextTranslationFeaturesParameters();
            if (isset($roomSpeechToTextTranslationFeatures['is_allow'])) {
                $speechToTextTranslationFeatures->setIsAllow($roomSpeechToTextTranslationFeatures['is_allow']);
            }
            if (isset($roomSpeechToTextTranslationFeatures['is_allow_translation'])) {
                $speechToTextTranslationFeatures->setIsAllowTranslation($roomSpeechToTextTranslationFeatures['is_allow_translation']);
            }
            $features->setSpeechToTextTranslationFeatures($speechToTextTranslationFeatures);
        }

        if (isset($roomMetadata['end_to_end_encryption_features'])) {
            $roomEndToEndEncryptionFeatures = $roomMetadata['end_to_end_encryption_features'];
            $endToEndEncryptionFeatures = new EndToEndEncryptionFeaturesParameters();
            if (isset($roomEndToEndEncryptionFeatures['is_enabled'])) {
                $endToEndEncryptionFeatures->setIsEnable($roomEndToEndEncryptionFeatures['is_enabled']);

                if (isset($roomEndToEndEncryptionFeatures['included_chat_messages'])) {
                    $endToEndEncryptionFeatures->setIncludedChatMessages($roomEndToEndEncryptionFeatures['included_chat_messages']);
                }

                if (isset($roomEndToEndEncryptionFeatures['included_whiteboard'])) {
                    $endToEndEncryptionFeatures->setIncludedWhiteboard($roomEndToEndEncryptionFeatures['included_whiteboard']);
                }
            }
            $features->setEndToEndEncryptionFeatures($endToEndEncryptionFeatures);
        }

        $metadata = new RoomMetadataParameters();
        $metadata->setRoomTitle($roomTitle);

        if (!empty($welcomeMessage)) {
            $metadata->setWelcomeMessage($welcomeMessage);
        }
        if (!empty($webHookUrl)) {
            $metadata->setWebhookUrl($webHookUrl);
        }
        if (!empty($logoutUrl)) {
            $metadata->setLogoutUrl($logoutUrl);
        }
        if (!empty($extraData)) {
            $metadata->setExtraData($extraData);
        }

        $metadata->setFeatures($features);

        if (isset($roomMetadata['default_lock_settings'])) {
            $defaultLocks = $roomMetadata['default_lock_settings'];
            $lockSettings = new LockSettingsParameters();

            if (isset($defaultLocks['lock_microphone'])) {
                $lockSettings->setLockMicrophone($defaultLocks['lock_microphone']);
            }
            if (isset($defaultLocks['lock_webcam'])) {
                $lockSettings->setLockWebcam($defaultLocks['lock_webcam']);
            }
            if (isset($defaultLocks['lock_screen_sharing'])) {
                $lockSettings->setLockScreenSharing($defaultLocks['lock_screen_sharing']);
            }
            if (isset($defaultLocks['lock_whiteboard'])) {
                $lockSettings->setLockWhiteboard($defaultLocks['lock_whiteboard']);
            }
            if (isset($defaultLocks['lock_shared_notepad'])) {
                $lockSettings->setLockSharedNotepad($defaultLocks['lock_shared_notepad']);
            }
            if (isset($defaultLocks['lock_chat'])) {
                $lockSettings->setLockChat($defaultLocks['lock_chat']);
            }
            if (isset($defaultLocks['lock_chat_send_message'])) {
                $lockSettings->setLockChatSendMessage($defaultLocks['lock_chat_send_message']);
            }
            if (isset($defaultLocks['lock_chat_file_share'])) {
                $lockSettings->setLockChatFileShare($defaultLocks['lock_chat_file_share']);
            }
            if (isset($defaultLocks['lock_private_chat'])) {
                $lockSettings->setLockPrivateChat($defaultLocks['lock_private_chat']);
            }

            $metadata->setDefaultLockSettings($lockSettings);
        }

        if (isset($roomMetadata['copyright_conf'])) {
            $conf = $roomMetadata['copyright_conf'];
            $copyrightConf = new CopyrightConfParameters();

            if (isset($conf["display"])) {
                $copyrightConf->setDisplay($conf["display"]);
            }
            if (isset($conf["text"])) {
                $copyrightConf->setText($conf["text"]);
            }

            $metadata->setCopyrightConf($copyrightConf);
        }

        $roomCreateParams = new CreateRoomParameters();
        $roomCreateParams->setRoomId($roomId);
        if ($max_participants > 0) {
            $roomCreateParams->setMaxParticipants($max_participants);
        }
        if ($empty_timeout > 0) {
            $roomCreateParams->setEmptyTimeout($empty_timeout);
        }
        $roomCreateParams->setRoomMetadata($metadata);

        return $this->plugnmeet->createRoom($roomCreateParams);
    }

    /**
     * @param string $roomId
     * @param string $name
     * @param string $userId
     * @param bool $isAdmin
     * @param bool $isHidden
     * @param UserMetadataParameters|null $userMetadata
     * @param LockSettingsParameters|null $lockSettings
     * @return GenerateJoinTokenResponse
     */
    public function getJoinToken(string $roomId, string $name, string $userId, bool $isAdmin, bool $isHidden = false, UserMetadataParameters $userMetadata = null, LockSettingsParameters $lockSettings = null): GenerateJoinTokenResponse
    {
        $generateJoinTokenParameters = new GenerateJoinTokenParameters();
        $generateJoinTokenParameters->setRoomId($roomId);
        $generateJoinTokenParameters->setName($name);
        $generateJoinTokenParameters->setUserId($userId);
        $generateJoinTokenParameters->setIsAdmin($isAdmin);
        $generateJoinTokenParameters->setIsHidden($isHidden);

        if ($userMetadata !== null) {
            $generateJoinTokenParameters->setUserMetadata($userMetadata);
            if ($lockSettings !== null) {
                $generateJoinTokenParameters->setLockSettings($lockSettings);
            }
        }

        return $this->plugnmeet->getJoinToken($generateJoinTokenParameters);
    }

    /**
     * @param string $roomId
     * @return EndRoomResponse
     */
    public function endRoom(string $roomId): EndRoomResponse
    {
        $endRoomParameters = new EndRoomParameters();
        $endRoomParameters->setRoomId($roomId);

        return $this->plugnmeet->endRoom($endRoomParameters);
    }

    /**
     * @param string $roomId
     * @return GetActiveRoomInfoResponse
     */
    public function getActiveRoomInfo(string $roomId)
    {
        $getActiveRoomInfoParameters = new GetActiveRoomInfoParameters();
        $getActiveRoomInfoParameters->setRoomId($roomId);

        return $this->plugnmeet->getActiveRoomInfo($getActiveRoomInfoParameters);
    }

    /**
     * @return stdclass
     */
    public function getActiveRoomsInfo()
    {
        return $this->plugnmeet->getActiveRoomsInfo();
    }

    /**
     * @param array $roomIds
     * @param int $from
     * @param int $limit
     * @param string $orderBy
     * @return FetchPastRoomsResponse
     */
    public function getPastRooms(array $roomIds, int $from = 0, int $limit = 20, string $orderBy = "DESC"): FetchPastRoomsResponse
    {
        $fetchPastRoomsParameters = new FetchPastRoomsParameters();
        $fetchPastRoomsParameters->setRoomIds($roomIds);
        $fetchPastRoomsParameters->setFrom($from);
        $fetchPastRoomsParameters->setLimit($limit);
        $fetchPastRoomsParameters->setOrderBy($orderBy);

        return $this->plugnmeet->fetchPastRoomsInfo($fetchPastRoomsParameters);
    }

    /**
     * @param array $roomIds
     * @param int $from
     * @param int $limit
     * @param string $orderBy
     * @return FetchRecordingsResponse
     */
    public function getRecordings(array $roomIds, int $from = 0, int $limit = 20, string $orderBy = "DESC"): FetchRecordingsResponse
    {
        $fetchRecordingsParameters = new FetchRecordingsParameters();
        $fetchRecordingsParameters->setRoomIds($roomIds);
        $fetchRecordingsParameters->setFrom($from);
        $fetchRecordingsParameters->setLimit($limit);
        $fetchRecordingsParameters->setOrderBy($orderBy);

        return $this->plugnmeet->fetchRecordings($fetchRecordingsParameters);
    }

    /**
     * @param string $recordingId
     * @return RecordingInfoResponse
     */
    public function getRecordingInfo(string $recordingId): RecordingInfoResponse
    {
        $recordingInfoParameters = new RecordingInfoParameters();
        $recordingInfoParameters->setRecordId($recordingId);

        return $this->plugnmeet->getRecordingInfo($recordingInfoParameters);
    }

    /**
     * @param  $recordingId
     * @return RecordingDownloadTokenResponse
     */
    public function getRecordingDownloadLink($recordingId): RecordingDownloadTokenResponse
    {
        $recordingDownloadTokenParameters = new RecordingDownloadTokenParameters();
        $recordingDownloadTokenParameters->setRecordId($recordingId);

        return $this->plugnmeet->getRecordingDownloadToken($recordingDownloadTokenParameters);
    }

    /**
     * @param  $recordingId
     * @return DeleteRecordingResponse
     */
    public function deleteRecording($recordingId): DeleteRecordingResponse
    {
        $deleteRecordingParameters = new DeleteRecordingParameters();
        $deleteRecordingParameters->setRecordId($recordingId);

        return $this->plugnmeet->deleteRecordings($deleteRecordingParameters);
    }

    /**
     * @param array $roomIds
     * @param int $from
     * @param int $limit
     * @param string $orderBy
     * @return FetchAnalyticsResponse
     */
    public function getAnalytics(array $roomIds, int $from = 0, int $limit = 20, string $orderBy = "DESC"): FetchAnalyticsResponse
    {
        $fetchAnalyticsParameters = new FetchAnalyticsParameters();
        $fetchAnalyticsParameters->setRoomIds($roomIds);
        $fetchAnalyticsParameters->setFrom($from);
        $fetchAnalyticsParameters->setLimit($limit);
        $fetchAnalyticsParameters->setOrderBy($orderBy);

        return $this->plugnmeet->fetchAnalytics($fetchAnalyticsParameters);
    }

    /**
     * @param  $fileId
     * @return AnalyticsDownloadTokenResponse
     */
    public function getAnalyticsDownloadLink($fileId): AnalyticsDownloadTokenResponse
    {
        $analyticsDownloadTokenParameters = new AnalyticsDownloadTokenParameters();
        $analyticsDownloadTokenParameters->setFileId($fileId);

        return $this->plugnmeet->getAnalyticsDownloadToken($analyticsDownloadTokenParameters);
    }

    /**
     * @param  $fileId
     * @return DeleteAnalyticsResponse
     */
    public function deleteAnalytics($fileId): DeleteAnalyticsResponse
    {
        $deleteAnalyticsParameters = new DeleteAnalyticsParameters();
        $deleteAnalyticsParameters->setFileId($fileId);

        return $this->plugnmeet->deleteAnalytics($deleteAnalyticsParameters);
    }

    /**
     * @return ClientFilesResponses
     */
    public function getClientFiles(): ClientFilesResponses
    {
        return $this->plugnmeet->getClientFiles();
    }
}
