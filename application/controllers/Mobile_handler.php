<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile_handler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'string'));
		$this->load->library(array('form_validation', 'session',));
	}

    public function login()
    {
        $data = array(
            'userID' => $this->input->post('userID'),
            'password' => sha1($this->input->post('password')),
        );

        $this->load->model('User');
        if($results = $this->User->login1($data))
        {
            // VALID LOGIN
            foreach($results as $result)
            {
                $role = $result->role_title;
                $status = $result->status;
            }

            if($role != "Teacher")
            {
                echo "Not Teacher";
            }
            elseif($status == 0)
            {
                echo "Not Activated";
            }
            else
            {
                echo "Success";
            }

        }
        else
        {
            echo "Invalid Credentials";
        }

    }




    public function getSubject($uid)
    {
        $this->load->model('Teach');
        $data = $this->Teach->select_teach($uid);
        
        header('Content-Type: application/json');
        // echo json_encode($data);
        echo json_encode($data);
    }

    public function thisSubject($subjectID,$sectionID)
    {
        $this->load->model('Teach');

        $subject = $this->Teach->get_section_subject($subjectID,$sectionID);


        header('Content-Type: application/json');
        echo json_encode($subject);
    }

    public function sectionStudent($sectionID)
    {
        $this->load->model('Teach');
        $student = $this->Teach->select_student($sectionID);
        header('Content-Type: application/json');
        echo json_encode($student);
    }

    public function getUser($uid)
    {
        $this->load->model('User');
        $user = $this->User->get_this($uid);
        header('Content-Type: application/json');
        echo json_encode($user);
    }

    public function mark_date($id=2,$sectionID=2)
    {
        $this->load->model('Teach');
        // $validate = $this->Attendance->date_exist($id,$sectionID,$this->input->post('date'));

		// if($validate)
		// {
        //     // Run exist
		// }
        // else
        // {
        //     $input_date = $this->input->post('date');
        //     $date = date('Y-m-d', strtotime($input_date));
        //     $weekday = date('l', strtotime($date));
        //     $query_success = $this->Teach->get_subject_sched($id, $sectionID, $weekday);
        //     if($query_success)
        //     {
        //         $attendance_status = $this->Teach->get_attendance_status();
        //         $student = $this->Teach->select_student($id);
        //         header('Content-Type: application/json');
        //     }
        // }

        // $input_date = $this->input->post('date');
        // $date = date('Y-m-d', strtotime($input_date));
        // $weekday = date('l', strtotime($date));
        // $query_success = $this->Teach->get_subject_sched($id, $sectionID, $weekday);

        // $attendance_status = $this->Teach->get_attendance_status();
        $student = $this->Teach->select_student($id);




        header('Content-Type: application/json');

        
        echo json_encode($student);
    }


    


}