<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $logo_name = 't' . $this['code'] . '.png';
        $logo_small = 'https://resources.premierleague.com/premierleague/badges/50/' . $logo_name;
        $logo_large = 'https://resources.premierleague.com/premierleague/badges/100/' . $logo_name;
        $stadium_image_small = 'https://www.premierleague.com/resources/prod/f4af34b-3761/i/stadiums/club-index/t' . $this['code'] . '.jpg';
        $stadium_image_large = 'https://www.premierleague.com/resources/prod/f4af34b-3761/i/stadiums/club-profile/t' . $this['code'] . '.jpg';
        $arrayData = [
            'code' => $this['code'],
            'draw' => $this['draw'],
            'form' => $this['form'],
            'id' => $this['id'],
            'loss' => $this['loss'],
            'name' => $this['name'],
            'played' => $this['played'],
            'points' => $this['points'],
            'position' => $this['position'],
            'logo_name' => $logo_name,
            'logo_small' => $logo_small,
            'logo_large' => $logo_large,
            'stadium_image_small' => $stadium_image_small,
            'stadium_image_large' => $stadium_image_large,
            'short_name' => $this['short_name'],
            'strength' => $this['strength'],
            'team_division' => $this['team_division'],
            'unavailable' => $this['unavailable'],
            'win' => $this['win'],
            'strength_overall_home' => $this['strength_overall_home'],
            'strength_overall_away' => $this['strength_overall_away'],
            'strength_attack_home' => $this['strength_attack_home'],
            'strength_attack_away' => $this['strength_attack_away'],
            'strength_defence_home' => $this['strength_defence_home'],
            'strength_defence_away' => $this['strength_defence_away'],
            'pulse_id' => $this['pulse_id']
        ];

        return $arrayData;
    }
}
