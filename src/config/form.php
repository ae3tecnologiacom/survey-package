<?php

return [
    'database' => [
        'schema' => env('FORM_DB_SCHEMA', 'forms'),
        'table_names' => [
            'field_types' => 'field_types',
            'input_types' => 'input_types',
            'options' => 'options',
            'questionnaires' => 'questionnaires',
            'statuses' => 'statuses',
            'questions' => 'questions',
            'groups' => 'groups',
            'surveys' => 'surveys',
            'question_options' => 'question_options',
            'group_questions' => 'group_questions',
            'group_conditions' => 'group_conditions',
            'survey_items' => 'survey_items',
            'survey_logs' => 'survey_logs',
        ],
        'order_column' => env('ORDER_COLUMN', 'order_num')
    ],
];
