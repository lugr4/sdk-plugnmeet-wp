<?php

/**
 *
 */
class CreateRoomResponse extends BaseResponse
{
    /**
     * @return ActiveRoomInfo|null
     */
    public function getRoomInfo(): ?ActiveRoomInfo
    {
        if (isset($this->rawResponse->room_info)) {
            return new ActiveRoomInfo($this->rawResponse->room_info);
        }

        return null;
    }
}
