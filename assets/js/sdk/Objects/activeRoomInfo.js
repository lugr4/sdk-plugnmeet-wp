// ActiveRoomInfoParams
  const ActiveRoomInfoParams = ({
    room_id = "" 
} = {}) => ({
    room_id,
});
  
  // ActiveRoomInfoResponse
  const ActiveRoomInfoResponse = ({
    status = false,
    msg = "",
    room = Room({}),
} = {}) => ({
    status,
    msg,
    room,
});
  
  // Room
  const Room = ({
    room_info = ActiveRoomInfo({}),
    participants_info = [],
} = {}) => ({
    room_info,
    participants_info,
});
  
  // ActiveRoomInfo
  const ActiveRoomInfo = ({
    room_title = "",
    room_id = "",
    sid = "",
    joined_participants = 0,
    is_running = false,
    is_recording = false,
    is_active_rtmp = false,
    webhook_url = "",
    creation_time = Date.now(),
    metadata = "",
} = {}) => ({
    room_title,
    room_id,
    sid,
    joined_participants,
    is_running,
    is_recording,
    is_active_rtmp,
    webhook_url,
    creation_time,
    metadata,
});
  
  // ParticipantInfo
  const ParticipantInfo = ({
    sid = "",
    identity = "",
    state = "",
    metadata = "",
    joined_at = Date.now(),
    name = "",
    version = 1,
    permission = {},
} = {}) => ({
    sid,
    identity,
    state,
    metadata,
    joined_at,
    name,
    version,
    permission,
});
  