// import { ActiveRoomInfo } from './activeRoomInfo.js';

/* export */ 
const createRoomParams = ({
  room_id = '',
  max_participants = '',
  empty_timeout = 0,
  metadata = createRooMetadata({})
} = {}) => ({
    room_id,
    max_participants,
    empty_timeout,
    metadata
});

// RooMetadata
/* export */ const createRooMetadata = ({
    room_title = "",
    welcome_message = "",
    webhook_url = "",
    logout_url = "",
    room_features = createRoomFeaturesParams({}),
    default_lock_settings = createLockSettingsParams({}),
    copyright_conf = createCopyrightConf({}),
    extra_data,
} = {}) => ({
    room_title,
    welcome_message,
    webhook_url,
    logout_url,
    room_features,
    default_lock_settings,
    copyright_conf,
    extra_data,
});
  
// RoomFeaturesParams
/* export */ const createRoomFeaturesParams = ({
    allow_webcams = false,
    mute_on_start = false,
    allow_screen_share = false,
    allow_rtmp = false,
    admin_only_webcams = false,
    allow_view_other_webcams = false,
    allow_view_other_users_list = false,
    room_duration = 0,
    enable_analytics = false,
    allow_virtual_bg = false,
    allow_raise_hand = false,
    auto_gen_user_id,
    recording_features = createRecordingFeaturesParams({}),
    chat_features = createChatFeaturesParams({}),
    shared_note_pad_features = createSharedNotePadFeaturesParams({}),
    whiteboard_features = createWhiteboardFeaturesParams({}),
    external_media_player_features = createExternalMediaPlayerFeatures({}),
    waiting_room_features = createWaitingRoomFeatures({}),
    breakout_room_features = createBreakoutRoomFeatures({}),
    display_external_link_features = createDisplayExternalLinkFeatures({}),
    ingress_features = createIngressFeatures({}),
    speech_to_text_translation_features = createSpeechToTextTranslationFeatures({}),
    end_to_end_encryption_features = createEndToEndEncryptionFeatures({}),
} = {}) => ({
    allow_webcams,
    mute_on_start,
    allow_screen_share,
    allow_rtmp,
    admin_only_webcams,
    allow_view_other_webcams,
    allow_view_other_users_list,
    room_duration,
    enable_analytics,
    allow_virtual_bg,
    allow_raise_hand,
    auto_gen_user_id,
    recording_features,
    chat_features,
    shared_note_pad_features,
    whiteboard_features,
    external_media_player_features,
    waiting_room_features,
    breakout_room_features,
    display_external_link_features,
    ingress_features,
    speech_to_text_translation_features,
    end_to_end_encryption_features,
});
  
  // RecordingFeaturesParams
/* export */ const createRecordingFeaturesParams = ({
    is_allow = false,
    is_allow_cloud = false,
    is_allow_local = false,
    enable_auto_cloud_recording = false,
  } = {}) => ({
    is_allow,
    is_allow_cloud,
    is_allow_local,
    enable_auto_cloud_recording,
  });
  
  // ChatFeaturesParams
/* export */ const createChatFeaturesParams = ({
    allow_chat = false,
    allow_file_upload = false,
    allowed_file_types = [],
    max_file_size = 0,
  } = {}) => ({
    allow_chat,
    allow_file_upload,
    allowed_file_types,
    max_file_size,
  });
  
  // SharedNotePadFeaturesParams
 /* export */ const createSharedNotePadFeaturesParams = ({
    allowed_shared_note_pad = false,
  } = {}) => ({
    allowed_shared_note_pad,
  });
  
  // WhiteboardFeaturesParams
/* export */ const createWhiteboardFeaturesParams = ({
    allowed_whiteboard = false,
    preload_file,
  } = {}) => ({
    allowed_whiteboard,
    preload_file,
  });
  
  // ExternalMediaPlayerFeatures
/* export */ const createExternalMediaPlayerFeatures = ({
    allowed_external_media_player = false,
  } = {}) => ({
    allowed_external_media_player,
  });
  
  // WaitingRoomFeatures
/* export */ const createWaitingRoomFeatures = ({
    is_active = false,
    waiting_room_msg,
  } = {}) => ({
    is_active,
    waiting_room_msg,
  });
  
  // BreakoutRoomFeatures
/* export */ const createBreakoutRoomFeatures = ({
    is_allow = false,
  } = {}) => ({
    is_allow,
  });
  
  // DisplayExternalLinkFeatures
/* export */ const createDisplayExternalLinkFeatures = ({
    is_allow = false,
  } = {}) => ({
    is_allow,
  });
  
  // IngressFeatures
/* export */ const createIngressFeatures = ({
    is_allow = false,
  } = {}) => ({
    is_allow,
  });
  
  // SpeechToTextTranslationFeatures
/* export */ const createSpeechToTextTranslationFeatures = ({
    is_allow = false,
    is_allow_translation = false,
  } = {}) => ({
    is_allow,
    is_allow_translation,
  });
  
  // EndToEndEncryptionFeatures
 /* export */ const createEndToEndEncryptionFeatures = ({
    is_enabled = false,
    included_chat_messages,
    included_whiteboard,
  } = {}) => ({
    is_enabled,
    included_chat_messages,
    included_whiteboard,
  });
  
  // LockSettingsParams
 /* export */ const createLockSettingsParams = ({
    lock_microphone,
    lock_webcam,
    lock_screen_sharing,
    lock_whiteboard,
    lock_shared_notepad,
    lock_chat,
    lock_chat_send_message,
    lock_chat_file_share,
  } = {}) => ({
    lock_microphone,
    lock_webcam,
    lock_screen_sharing,
    lock_whiteboard,
    lock_shared_notepad,
    lock_chat,
    lock_chat_send_message,
    lock_chat_file_share,
  });
  
  // CopyrightConf
 /* export */ const createCopyrightConf = ({
    display = false,
    text = "",
  } = {}) => ({
    display,
    text,
  });
  
  // CreateRoomResponse
/* export */ const createCreateRoomResponse = ({
    status = false,
    msg = "",
    room_info = ActiveRoomInfo({}),
  } = {}) => ({
    status,
    msg,
    room_info,
  });
  