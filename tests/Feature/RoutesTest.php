<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    // use RefreshDatabase;

    public function test_home_page_shows_page_title()
    {
        $view = $this->view('index', ['project_tasks' => array()]);
 
        $view->assertSee('HOME');
    }

    public function test_manage_tasks_page_shows_page_title()
    {
        $view = $this->view('manage_tasks', ['project_tasks' => array()]);
 
        $view->assertSee('MANAGE TASKS');
    }

    public function test_calendar_page_shows_page_title()
    {
        $view = $this->view('calendar', ['project_tasks' => array()]);
 
        $view->assertSee('CALENDAR');
    }

    public function test_task_summary_page_shows_page_title()
    {
        $view = $this->view('visualization', ['status_type_count' => 0]);
 
        $view->assertSee('TASK SUMMARY');
    }

    public function test_login_page_shows_page_title()
    {
        $view = $this->view('login');
 
        $view->assertSee('Task Manager');
    }
    
    public function test_create_account_page_shows_page_title()
    {
        $view = $this->view('add_user');
 
        $view->assertSee('Create Account');
    }
    
}