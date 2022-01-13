<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $element_type = '';
        $photo_name = 'p' . $this['code'] . '.png';
        $photo_small = 'https://resources.premierleague.com/premierleague/photos/players/40x40/' . $photo_name;
        $photo_large = 'https://resources.premierleague.com/premierleague/photos/players/250x250/' . $photo_name;


        switch ($this['element_type']) {
            case 1:
                $element_type = 'Goalkeeper';
                break;
            case 2:
                $element_type = 'Defender';
                break;
            case 3:
                $element_type = 'Midfielder';
                break;
            case 4:
                $element_type = 'Forward';
                break;
        }

        $arrayData = [
            'chance_of_playing_next_round' => $this['chance_of_playing_next_round'],
            'chance_of_playing_this_round' => $this['chance_of_playing_this_round'],
            'code' => $this['code'],
            'cost_change_event' => $this['cost_change_event'],
            'cost_change_event_fall' => $this['cost_change_event_fall'],
            'cost_change_start' => $this['cost_change_start'],
            'cost_change_start_fall' => $this['cost_change_start_fall'],
            'dreamteam_count' => $this['dreamteam_count'],
            'element_type' => $element_type,
            'ep_next' => $this['ep_next'],
            'ep_this' => $this['ep_this'],
            'event_points' => $this['event_points'],
            'first_name' => $this['first_name'],
            'form' => $this['form'],
            'id' => $this['id'],
            'in_dreamteam' => $this['in_dreamteam'],
            'news' => $this['news'],
            'news_added' => $this['news_added'],
            'now_cost' => $this['now_cost'],
            'photo_name' => $photo_name,
            'photo_small' => $photo_small,
            'photo_big' => $photo_large,
            'points_per_game' => $this['points_per_game'],
            'second_name' => $this['second_name'],
            'selected_by_percent' => $this['selected_by_percent'],
            'special' => $this['special'],
            'squad_number' => $this['squad_number'],
            'status' => $this['status'],
            'team' => $this['team'],
            'team_code' => $this['team_code'],
            'total_points' => $this['total_points'],
            'transfers_in' => $this['transfers_in'],
            'transfers_in_event' => $this['transfers_in_event'],
            'transfers_out' => $this['transfers_out'],
            'transfers_out_event' => $this['transfers_out_event'],
            'value_form' => $this['value_form'],
            'value_season' => $this['value_season'],
            'web_name' => $this['web_name'],
            'minutes' => $this['minutes'],
            'goals_scored' => $this['goals_scored'],
            'assists' => $this['assists'],
            'clean_sheets' => $this['clean_sheets'],
            'goals_conceded' => $this['goals_conceded'],
            'own_goals' => $this['own_goals'],
            'penalties_saved' => $this['penalties_saved'],
            'penalties_missed' => $this['penalties_missed'],
            'yellow_cards' => $this['yellow_cards'],
            'red_cards' => $this['red_cards'],
            'saves' => $this['saves'],
            'bonus' => $this['bonus'],
            'bps' => $this['bps'],
            'influence' => $this['influence'],
            'creativity' => $this['creativity'],
            'threat' => $this['threat'],
            'ict_index' => $this['ict_index'],
            'influence_rank' => $this['influence_rank'],
            'influence_rank_type' => $this['influence_rank_type'],
            'creativity_rank' => $this['creativity_rank'],
            'creativity_rank_type' => $this['creativity_rank_type'],
            'threat_rank' => $this['threat_rank'],
            'threat_rank_type' => $this['threat_rank_type'],
            'ict_index_rank' => $this['ict_index_rank'],
            'ict_index_rank_type' => $this['ict_index_rank_type'],
            'corners_and_indirect_freekicks_order' => $this['corners_and_indirect_freekicks_order'],
            'corners_and_indirect_freekicks_text' => $this['corners_and_indirect_freekicks_text'],
            'direct_freekicks_order' => $this['direct_freekicks_order'],
            'direct_freekicks_text' => $this['direct_freekicks_text'],
            'penalties_order' => $this['penalties_order'],
            'penalties_text' => $this['penalties_text'],
        ];

        return $arrayData;
    }
}
