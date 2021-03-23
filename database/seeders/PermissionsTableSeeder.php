<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'asset_management_access',
            ],
            [
                'id'    => 20,
                'title' => 'asset_category_create',
            ],
            [
                'id'    => 21,
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => 22,
                'title' => 'asset_category_show',
            ],
            [
                'id'    => 23,
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => 24,
                'title' => 'asset_category_access',
            ],
            [
                'id'    => 25,
                'title' => 'asset_location_create',
            ],
            [
                'id'    => 26,
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => 27,
                'title' => 'asset_location_show',
            ],
            [
                'id'    => 28,
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => 29,
                'title' => 'asset_location_access',
            ],
            [
                'id'    => 30,
                'title' => 'asset_status_create',
            ],
            [
                'id'    => 31,
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => 32,
                'title' => 'asset_status_show',
            ],
            [
                'id'    => 33,
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => 34,
                'title' => 'asset_status_access',
            ],
            [
                'id'    => 35,
                'title' => 'asset_create',
            ],
            [
                'id'    => 36,
                'title' => 'asset_edit',
            ],
            [
                'id'    => 37,
                'title' => 'asset_show',
            ],
            [
                'id'    => 38,
                'title' => 'asset_delete',
            ],
            [
                'id'    => 39,
                'title' => 'asset_access',
            ],
            [
                'id'    => 40,
                'title' => 'assets_history_access',
            ],
            [
                'id'    => 41,
                'title' => 'branch_create',
            ],
            [
                'id'    => 42,
                'title' => 'branch_edit',
            ],
            [
                'id'    => 43,
                'title' => 'branch_show',
            ],
            [
                'id'    => 44,
                'title' => 'branch_delete',
            ],
            [
                'id'    => 45,
                'title' => 'branch_access',
            ],
            [
                'id'    => 46,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 47,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 48,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 49,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 50,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 51,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 52,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 53,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 54,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 55,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 56,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 57,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 58,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 59,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 60,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 61,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 62,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 63,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 64,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 65,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 66,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 67,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 68,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 69,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 70,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 71,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 72,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 73,
                'title' => 'expense_create',
            ],
            [
                'id'    => 74,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 75,
                'title' => 'expense_show',
            ],
            [
                'id'    => 76,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 77,
                'title' => 'expense_access',
            ],
            [
                'id'    => 78,
                'title' => 'income_create',
            ],
            [
                'id'    => 79,
                'title' => 'income_edit',
            ],
            [
                'id'    => 80,
                'title' => 'income_show',
            ],
            [
                'id'    => 81,
                'title' => 'income_delete',
            ],
            [
                'id'    => 82,
                'title' => 'income_access',
            ],
            [
                'id'    => 83,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 84,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 85,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 86,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 87,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 88,
                'title' => 'member_create',
            ],
            [
                'id'    => 89,
                'title' => 'member_edit',
            ],
            [
                'id'    => 90,
                'title' => 'member_show',
            ],
            [
                'id'    => 91,
                'title' => 'member_delete',
            ],
            [
                'id'    => 92,
                'title' => 'member_access',
            ],
            [
                'id'    => 93,
                'title' => 'membership_management_access',
            ],
            [
                'id'    => 94,
                'title' => 'membership_category_create',
            ],
            [
                'id'    => 95,
                'title' => 'membership_category_edit',
            ],
            [
                'id'    => 96,
                'title' => 'membership_category_show',
            ],
            [
                'id'    => 97,
                'title' => 'membership_category_delete',
            ],
            [
                'id'    => 98,
                'title' => 'membership_category_access',
            ],
            [
                'id'    => 99,
                'title' => 'rally_management_access',
            ],
            [
                'id'    => 100,
                'title' => 'rally_event_create',
            ],
            [
                'id'    => 101,
                'title' => 'rally_event_edit',
            ],
            [
                'id'    => 102,
                'title' => 'rally_event_show',
            ],
            [
                'id'    => 103,
                'title' => 'rally_event_delete',
            ],
            [
                'id'    => 104,
                'title' => 'rally_event_access',
            ],
            [
                'id'    => 105,
                'title' => 'rally_user_create',
            ],
            [
                'id'    => 106,
                'title' => 'rally_user_edit',
            ],
            [
                'id'    => 107,
                'title' => 'rally_user_show',
            ],
            [
                'id'    => 108,
                'title' => 'rally_user_delete',
            ],
            [
                'id'    => 109,
                'title' => 'rally_user_access',
            ],
            [
                'id'    => 110,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 111,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 112,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 113,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 114,
                'title' => 'membership_status_create',
            ],
            [
                'id'    => 115,
                'title' => 'membership_status_edit',
            ],
            [
                'id'    => 116,
                'title' => 'membership_status_show',
            ],
            [
                'id'    => 117,
                'title' => 'membership_status_delete',
            ],
            [
                'id'    => 118,
                'title' => 'membership_status_access',
            ],
            [
                'id'    => 119,
                'title' => 'asset_type_create',
            ],
            [
                'id'    => 120,
                'title' => 'asset_type_edit',
            ],
            [
                'id'    => 121,
                'title' => 'asset_type_show',
            ],
            [
                'id'    => 122,
                'title' => 'asset_type_delete',
            ],
            [
                'id'    => 123,
                'title' => 'asset_type_access',
            ],
            [
                'id'    => 124,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 125,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 126,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 127,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 128,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 129,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 130,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 131,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 132,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 133,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 134,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 135,
                'title' => 'task_create',
            ],
            [
                'id'    => 136,
                'title' => 'task_edit',
            ],
            [
                'id'    => 137,
                'title' => 'task_show',
            ],
            [
                'id'    => 138,
                'title' => 'task_delete',
            ],
            [
                'id'    => 139,
                'title' => 'task_access',
            ],
            [
                'id'    => 140,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 141,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 142,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 143,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 144,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 145,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 146,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 147,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 148,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 149,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 150,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 151,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 152,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
