<?php

namespace common\models;

use yii\db\ActiveRecord;

class SurveyResponse extends ActiveRecord
{
    public $least_useful_chart;

    public static function tableName()
    {
        return 'survey_responses';
    }

    public function rules()
{
    return [
        // Other rules for different attributes...
        [['visualight_rating', 'charts_useful', 'scorecards_rating', 'filters_helpful', 'charts_summary', 'user_friendly_rating', 'charts_color_palette', 'charts_easy_to_understand', 'most_useful_chart'], 'required'],
        ['comments', 'default', 'value' => null],

        
    ];
}


    
}
