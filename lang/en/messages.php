<?php
$data = [
    'create_success' => function ($value) {
        return "Data $value created successfully";
    },
    'update_success' => function ($value) {
        return "Data $value updated successfully";
    },
    'delete_success' => function ($value) {
        return "Data $value deleted successfully";
    },
    'get_success' => function ($value) {
        return "Data $value retrieved successfully";
    },
    'status_change_success' => function ($value) {
        return "Data $value status changed successfully";
    },
    'not_found' => function ($value) {
        return "Data $value not found";
    },
];

return [
    'not_found_assistant' => $data['not_found']('assistant'),
    'internal_server_error' => 'Sorry an unexpected error occurred',

    'create_assistant_success' => $data['create_success']('assistant'),
    'update_assistant_success' => $data['update_success']('assistant'),
    'delete_assistant_success' => $data['delete_success']('assistant'),
    'get_assistant_success' => $data['get_success']('assistant'),
    'status_change_assistant_success' => $data['status_change_success']('assistant'),
    'assistant' => 'Assistant Page',
    'assistant_description' => 'Manage assistant data for this application',

    'create_major_success' => $data['create_success']('major'),
    'update_major_success' => $data['update_success']('major'),
    'delete_major_success' => $data['delete_success']('major'),
    'get_major_success' => $data['get_success']('major'),
    'major' => 'Major Page',
    'major_description' => 'Manage major data for this application',

    'create_class_success' => $data['create_success']('class'),
    'update_class_success' => $data['update_success']('class'),
    'delete_class_success' => $data['delete_success']('class'),
    'get_class_success' => $data['get_success']('class'),
    'class' => 'Class Page',
    'class_description' => 'Manage class data for this application',

    'create_room_success' => $data['create_success']('room'),
    'update_room_success' => $data['update_success']('room'),
    'delete_room_success' => $data['delete_success']('room'),
    'get_room_success' => $data['get_success']('room'),
    'room' => 'Room Page',
    'room_description' => 'Manage room data for this application',

    'create_practical_lesson_success' => $data['create_success']('practical lesson'),
    'update_practical_lesson_success' => $data['update_success']('practical lesson'),
    'delete_practical_lesson_success' => $data['delete_success']('practical lesson'),
    'get_practical_lesson_success' => $data['get_success']('practical lesson'),
    'practical_lesson' => 'Practical Lesson Page',
    'practical_lesson_description' => 'Manage practical lesson data for this application',


    'account_settings' => 'Account Settings',
    'account_settings_description' => 'Manage your account settings',
];
