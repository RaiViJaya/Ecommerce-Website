<?php

namespace App\Controllers;

use App\Models\UserDetailsModel;
use App\Models\UserModel ;
class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    
    }

    public function register()
    { //echo $this->request->getVar("username"); die;
        // get

        if($this->request->getMethod()=="get"){
            echo view('register');
        }      


        // method
        else if($this->request->getMethod()=="post"){
            // echo "Hello"; die;
            // helper('form');
            //  $validation = \Config\Services::validation();
            //  echo "Hello"; print_r($validation); die;
            if($this->validate([
                "username"=>"required",
                "email"=>"required|valid_email",
                "password"=>"required|min_length[5]|max_length[20]",
                "cpassword"=>"matches[password]"
            ])){
               
            //submit the form
                $username=$this->request->getVar("username");
                $email=$this->request->getVar("email");
                $password=$this->request->getVar("password"); 
                
                // now save the data at the database using model
                $data=[
                    "username"=>$username,
                    "email"=>$email,
                    "password"=>$password
                ];

                $model = new UserModel();
                $model->insert($data);

                $session=session();
                $session->set("success_message","User registered successfully");
                // $k = $session->getFlashdata('success_message');
                // echo "$k";
                // echo var_dump($session->getFlashdata('success_message'));
                $success_message = $session->get("success_message");
                // echo var_dump($success_message);
                return view("register");

                // echo "User registered successfully";
            
            }            
            else{
                // echo "<pre>"; print_r($validation->getErrors()); die;
                return redirect()->back()->withInput();
            }
        }
    }

    public function login()
    {
        if($this->request->getMethod()=="get"){
            echo view('login');
        }

        else if($this->request->getMethod()=="post"){

            // validate
            if($this->validate([
                "email"=>"required|valid_email",
                "password"=>"required",
    
            ])){
                $model = new UserModel();
                $record = $model->where("email", $this->request->getVar("email"))
                ->where("password", $this->request->getVar("password"))
                ->first();
                $session=session();
                if(!is_null($record)){
                    // data found at database
                    $sess_data=[
                        "user_id"=>$record['id'],
                        "username"=>$record['username'],
                        "email"=>$record["email"],
                        "user_type"=>$record["user_type"],
                        "loginned"=>'loginned'

                    ];
                    $session->set($sess_data);
                    if($record['user_type']=="user"){
                        //go to user page
                        $url = "user_dashboard";
                    }
                    else if($record['user_type']=="admin"){
                        // go to admin page
                        $url = "admin/admin_dashboard";
                    }
                    return redirect()->to(base_url($url));
                }
                else{
                    
                    $session->set("failed_message","Record does not matched, try again");
                    $failed_message = $session->get("failed_message");
                    return redirect()->back()->withInput();
                }
            }

            else{
                return redirect()->back()->withInput();
            }
               
        }

    }

    public function generatePDF(){
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('sample'));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Users list');
    }

    public function logout(){
        $session = session();
        session_unset();
        session_destroy();
        return redirect()->to(base_url());
    }

    public function profile(){
       if($this->request->getMethod()=='get'){
        echo view('profile');
       }
       else if($this->request->getMethod()=='post'){
            $country=$this->request->getVar("country");
            $state=$this->request->getVar("state");
            $district=$this->request->getVar("district");
            $pincode=$this->request->getVar("pincode");
            $mobile=$this->request->getVar("mobile");
            $local_address=$this->request->getVar("local_address");
            $permanent_address=$this->request->getVar("permanent_address");
            
            $model = new UserDetailsModel();
            $session = session();
            $user_id = $session->user_id;
            $record = $model->where("user_id", $user_id)->first();
            //var_dump($record); die;
            $data = [
                'user_id'=>$user_id,
                'country'=>$country,
                'state'=>$state, 
                'district'=>$district,
                'pincode'=>$pincode,
                'mobile'=> $mobile,
                'local_address'=>$local_address,
                'permanent_address'=>$permanent_address
            ];
            // var_dump($model); die;
            if(!is_null($record)){
                //update
                $model->update($user_id, $data);
            }
            else{
                // insert
                $model->insert($data);
                
            }
            return redirect()->to(base_url("profile"));
       } 
    }

    public function contact(){
        echo view('contact');
    }

    // public function sum($x=0, $y=0){
    //     $z = $x + $y ;
    //     echo "sum:$z";
    // }
}   
