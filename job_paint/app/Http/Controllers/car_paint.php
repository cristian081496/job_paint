<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\car_paint_model;
class car_paint extends Controller
{
    public function create_new(Request $request)
    {
    	$payload = json_decode(file_get_contents('php://input'));
    	if(!empty($payload->car_plate_no)  && !empty($payload->current_color) && !empty($payload->target_color)):

    	$data = array(
    		'car_plate_no' => $payload->car_plate_no,
    		'current_color' => $payload->current_color,
    		'target_color' => $payload->target_color,
    		'status' => 1
    		 );
    	$sql =  car_paint_model::create($data);

	    	$response = array(
	    			"status" => "SUCCESS",
	    			"message" => "Paint Job is Added");
   
    	else:
    		$response = array(
    			"status" => "FAILED",
    			"message" => "All Fields are Required",
    			"payload" => $payload->car_plate_no);
    	endif;

    	return json_encode($response);
    }
    public function updateStatus(Request $request)
    {
        $payload = json_decode(file_get_contents('php://input'));
        if(!empty($payload->status) && !empty($payload->id)):

        $data = array(
            'status' => $payload->status
             );
        $sql =  car_paint_model::where(array('id' => $payload->id))->update($data);

            $response = array(
                    "status" => "SUCCESS",
                    "message" => "Paint Job is Updated");
   
        else:
            $response = array(
                "status" => "FAILED",
                "message" => "All Fields are Required");
        endif;

        return json_encode($response);
    }

    public function allProgress(Request $request)
    {
        $data = array();
        $count =  car_paint_model::where(array('status' => "2"))->get()->count();

        if($count < 5):
            $numberRows = 5 - $count;
        else:
            $numberRows = 0;
        endif;

        $sql =  car_paint_model::where(array('status' => "1"))->limit($numberRows)->get();
            foreach ($sql as $paint):

             $sqlUpdate =  car_paint_model::where(array('id' => $paint->id))->update(array("status" => "2"));
            endforeach;

        $all = car_paint_model::where(array('status' => "2"))->get();
            foreach ($all as $val):
                    array_push($data, array(
                        "id" => $val->id,
                        "car_plate_no" => $val->car_plate_no,
                        "current_color" => $val->current_color,
                        "target_color" => $val->target_color,
                        "status" => $val->status
                    ));
           endforeach;
            $response = array(
                    "status" => "SUCCESS",
                    "payload" => $data
                    );
   
        // else:
        //     $response = array(
        //         "status" => "FAILED",
        //         "message" => "No Records Fond");
        // endif;

        return json_encode($response);
    }
    public function allQueue(Request $request)
    {
        $data = array();
        $all = car_paint_model::where(array('status' => "1"))->get();
            foreach ($all as $val):
                    array_push($data, array(
                        "id" => $val->id,
                        "car_plate_no" => $val->car_plate_no,
                        "current_color" => $val->current_color,
                        "target_color" => $val->target_color,
                        "status" => $val->status
                    ));
           endforeach;
            $response = array(
                    "status" => "SUCCESS",
                    "payload" => $data
                    );

        return json_encode($response);
    }
    public function allCarsPainted(Request $request)
    {
        
        $data = array();
        $allPainted = car_paint_model::where(array('status' => "3"))->get()->count();
        $blue = car_paint_model::where(array('status' => "3","target_color" => "blue"))->get()->count();
        $red = car_paint_model::where(array('status' => "3","target_color" => "red"))->get()->count();
        $green = car_paint_model::where(array('status' => "3","target_color" => "green"))->get()->count();

            $response = array(
                    "status" => "SUCCESS",
                    "payload" => array("all" => $allPainted,"green" => $green, "red" => $red, "blue" => $blue)
                    );

        return json_encode($response);
    }

}