<?php
/**
 *
 */
class GetActiveRoomInfoResponse extends BaseResponse
{
    /**
     * @return ActiveRoomInfo|null
     */
    public function getActiveRoomInfo(): ?ActiveRoomInfo
    {
        if (isset($this->rawResponse->room->room_info)) {
            return new ActiveRoomInfo($this->rawResponse->room->room_info);
        }
        return null;
    }

    /**
     * @return ParticipantInfo[ ]
     */
    public function getParticipantsInfo(): array
    {
        $participants = [];

        if (
            isset($this->rawResponse->room->participants_info) &&
            count($this->rawResponse->room->participants_info) > 0
        ) {
            foreach ($this->rawResponse->room->participants_info as $participant) {
                $participants[] = new ParticipantInfo($participant);
            }
        }

        return $participants;
    }
}
