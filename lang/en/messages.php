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
    'create_assistant_success' => $data['create_success']('assistant'),
    'update_assistant_success' => $data['update_success']('assistant'),
    'delete_assistant_success' => $data['delete_success']('assistant'),
    'get_assistant_success' => $data['get_success']('assistant'),
    'not_found_assistant' => $data['not_found']('assistant'),
    'internal_server_error' => 'Sorry an unexpected error occurred',
    'status_change_assistant_success' => $data['status_change_success']('assistant'),
    'assistant' => 'Assistant Page',
    'assistant_description' => 'Manage assistant data for this application',

    'account_settings' => 'Account Settings',
    'account_settings_description' => 'Manage your account settings',
];