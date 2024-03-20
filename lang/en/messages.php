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
    'assistant' => 'Assistant',
    'assistant_page' => 'Assistant Page',
    'assistant_description' => 'Manage assistant data for this application',

    'create_major_success' => $data['create_success']('major'),
    'update_major_success' => $data['update_success']('major'),
    'delete_major_success' => $data['delete_success']('major'),
    'get_major_success' => $data['get_success']('major'),
    'major' => 'Major',
    'major_page' => 'Major Page',
    'major_description' => 'Manage major data for this application',

    'create_period_success' => $data['create_success']('period'),
    'update_period_success' => $data['update_success']('period'),
    'delete_period_success' => $data['delete_success']('period'),
    'get_period_success' => $data['get_success']('period'),
    'period' => 'Period',
    'period_page' => 'Period Page',
    'period_description' => 'Manage period data for this application',

    'create_class_success' => $data['create_success']('class'),
    'update_class_success' => $data['update_success']('class'),
    'delete_class_success' => $data['delete_success']('class'),
    'get_class_success' => $data['get_success']('class'),
    'class' => 'Class',
    'class_page' => 'Class Page',
    'class_description' => 'Manage class data for this application',
    'class_already_exists' => 'Class already exists',

    'create_room_success' => $data['create_success']('room'),
    'update_room_success' => $data['update_success']('room'),
    'delete_room_success' => $data['delete_success']('room'),
    'get_room_success' => $data['get_success']('room'),
    'room' => 'Room',
    'room_page' => 'Room Page',
    'room_description' => 'Manage room data for this application',

    'create_practical_lesson_success' => $data['create_success']('practical lesson'),
    'update_practical_lesson_success' => $data['update_success']('practical lesson'),
    'delete_practical_lesson_success' => $data['delete_success']('practical lesson'),
    'get_practical_lesson_success' => $data['get_success']('practical lesson'),
    'practical_lesson' => 'Practical Lesson',
    'practical_lesson_page' => 'Practical Lesson Page',
    'practical_lesson_description' => 'Manage practical lesson data for this application',

    'create_student_success' => $data['create_success']('student'),
    'update_student_success' => $data['update_success']('student'),
    'delete_student_success' => $data['delete_success']('student'),
    'get_student_success' => $data['get_success']('student'),
    'get_search_student_success' => $data['get_success']('student'),
    'student' => 'Student',
    'student_page' => 'Student Page',
    'student_description' => 'Manage student data for this application',
    'import_student_success' => 'Student data imported successfully',

    'create_schedule_success' => $data['create_success']('schedule'),
    'update_schedule_success' => $data['update_success']('schedule'),
    'delete_schedule_success' => $data['delete_success']('schedule'),
    'get_schedule_success' => $data['get_success']('schedule'),
    'schedule' => 'Schedule',
    'schedule_page' => 'Schedule Page',
    'schedule_description' => 'Manage schedule data for this application',

    'create_faq_success' => $data['create_success']('faq'),
    'update_faq_success' => $data['update_success']('faq'),
    'delete_faq_success' => $data['delete_success']('faq'),
    'get_faq_success' => $data['get_success']('faq'),
    'faq' => 'Faq',
    'faq_page' => 'Faq Page',
    'faq_description' => 'Manage faq data for this application',

    'create_supporter_success' => $data['create_success']('supporter'),
    'update_supporter_success' => $data['update_success']('supporter'),
    'delete_supporter_success' => $data['delete_success']('supporter'),
    'get_supporter_success' => $data['get_success']('supporter'),
    'supporter' => 'Supporter',
    'supporter_page' => 'Supporter Page',
    'supporter_description' => 'Manage supporter data for this application',


    'account_settings' => 'Account Settings',
    'account_settings_description' => 'Manage your account settings',

    'home_about' => 'About',
    'home_about_description' => 'Manage about data for this application',

    'home_banner' => 'Banner',
    'home_banner_description' => 'Manage banner data for this application',
];
