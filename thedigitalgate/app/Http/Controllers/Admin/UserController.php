<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\aspirant;
use App\Models\trainer;
use App\Models\module_creation;

class UserController extends Controller
{
    public function userList()
    {
        return view('admin.userlist');
    }
    public function listUserData(Request $request)
    {
        $skip = @$request->start_index ? $request->start_index : 0;
        $limit = @$request->limit_length ? $request->limit_length : 15;
        $search_by = @$request->search_by ? $request->search_by : '';
        $export_file = @$request->export_file ? $request->export_file : 0;

        $AID = $request->session()->get('Aspirant_ID');
        $TID = $request->session()->get('Trainer_ID');
        
        $selectedFields = ["first_name", "second_name", "email_id", "mobile", "is_block"];
        if(@$AID)
        {
            $selectedFields[] = "aspirant_id AS user_id";
            $listData = aspirant::select($selectedFields)
                        ->where("user_role", 1);
                        if(@$search_by)
                        {
                            
                            $listData->where(function ($query) use ($search_by) {
                                $query->where('first_name', 'like', '%' . $search_by . '%')
                                ->orWhere('second_name', 'like', '%' . $search_by . '%')
                                ->orWhere('email_id', 'like', '%' . $search_by . '%');
                            });
                            // $listData->where('first_name', 'like', '%' . $search_by . '%')
                            // ->orWhere('second_name', 'like', '%' . $search_by . '%')
                            // ->orWhere('email_id', 'like', '%' . $search_by . '%');
                        }
            if($export_file == 0)
            {
                $listData->skip($skip)
                        ->limit($limit);        
            }
            $listData = $listData->orderBy('user_id', 'desc')
                        ->get();
        }
        if(@$TID)
        {
            $selectedFields[] = "trainer_id AS user_id";
            $selectedFields[] = "is_approved";
            $listData = trainer::select($selectedFields)
                        ->selectRaw('(SELECT COUNT(trainer_id) FROM module_creations WHERE module_creations.trainer_id = trainer_master.trainer_id) AS totalModule')
                        ->where("user_role", 1);
                        if(@$search_by)
                        {
                            $listData->where(function ($query) use ($search_by) {
                                $query->where('first_name', 'like', '%' . $search_by . '%')
                                ->orWhere('second_name', 'like', '%' . $search_by . '%')
                                ->orWhere('email_id', 'like', '%' . $search_by . '%');
                            });
                            // $listData->where('first_name', 'like', '%' . $search_by . '%')
                            // ->orWhere('second_name', 'like', '%' . $search_by . '%')
                            // ->orWhere('email_id', 'like', '%' . $search_by . '%');
                        }
            if($export_file == 0)
            {
                $listData->skip($skip)
                        ->limit($limit);        
            }
            $listData = $listData->orderBy('user_id', 'desc')
                        ->get();
        }
        
        $listData = @$listData ? $listData->toArray() : array();

        $html = '';
        if(@$listData && $export_file == 0)
        {
            foreach ($listData as $key => $rowData) {
                $html .= '<tr class="table_tr_css table_tr_jss" data_id="'. $rowData['user_id'] .'">';
                    $html .= '<td>'. $rowData['first_name'] . ' '. $rowData['second_name'] .'</td>';
                    $html .= '<td>'. $rowData['email_id'] .'</td>';
                    $html .= '<td>'. $rowData['mobile'] .'</td>';
                    if($TID != "")
                    {
                        $html .= '<td>'. @$rowData['totalModule'] .'</td>';
                    }
                    $html .= '<td>
                        <input type="checkbox" name="block_user" value="'. ($rowData['is_block'] == 1 ? 0 : 1) .'" class="block_user_css block_user_jss" '. ($rowData['is_block'] == 1 ? "checked" : "") .'>
                    </td>';
                    if($TID != "")
                    {
                        $html .= '<td>
                            <input type="checkbox" name="is_approved" value="'. ($rowData['is_approved'] == 1 ? 0 : 1) .'" class="is_approved_css is_approved_jss" '. ($rowData['is_approved'] == 1 ? "checked" : "") .'>
                        </td>';
                    }
                    $html .= '<td><button type="button" class="btn btn-danger delete_user_btn_jss"><span class="fa fa-trash"></span></button></td>';
                $html .= '</tr>';
            }
        }

        $returnArr = array("status" => 1, "html" => $html);
        if(@$listData && $export_file == 1)
        {
            $returnArr['listData'] = $listData;
        }
        return $returnArr;
    }
    public function block_user(Request $request)
    {
        $AID = $request->session()->get('Aspirant_ID');
        $TID = $request->session()->get('Trainer_ID');
        
        $is_block = isset($request->is_block) ? $request->is_block : 1;
        $user_id = isset($request->user_id) ? $request->user_id : 0;
        if(@$AID && @$user_id)
        {
            aspirant::where('aspirant_id', $user_id)->update(
                [
                    'is_block' => $is_block
                ]
            );
            $returnArr = array("status" => 1, "msg" => "Success!");
            return $returnArr;
        }
        if(@$TID && @$user_id)
        {
            trainer::where('trainer_id', $user_id)->update(
                [
                    'is_block' => $is_block
                ]
            );
            $returnArr = array("status" => 1, "msg" => "Success!");
            return $returnArr;
        }
        $returnArr = array("status" => 0, "msg" => "Failed!");
        return $returnArr;
    }
    public function approve_user(Request $request)
    {
        $TID = $request->session()->get('Trainer_ID');
        
        $is_approved = isset($request->is_approved) ? $request->is_approved : 1;
        $user_id = isset($request->user_id) ? $request->user_id : 0;
        
        if(@$TID && @$user_id)
        {
            trainer::where('trainer_id', $user_id)->update(
                [
                    'is_approved' => $is_approved
                ]
            );
            $returnArr = array("status" => 1, "msg" => "Success!");
            return $returnArr;
        }
        $returnArr = array("status" => 0, "msg" => "Failed!");
        return $returnArr;
    }
    public function delete_user(Request $request)
    {
        $AID = $request->session()->get('Aspirant_ID');
        $TID = $request->session()->get('Trainer_ID');
        
        $user_id = isset($request->user_id) ? $request->user_id : 0;
        if(@$AID && @$user_id)
        {
            $delete = aspirant::where('aspirant_id', $user_id)->delete();
            if($delete)
            {
                $returnArr = array("status" => 1, "msg" => "Success!");
            }
            else
            {
                $returnArr = array("status" => 0, "msg" => "Failed!");
            }
            return $returnArr;
        }
        if(@$TID && @$user_id)
        {
            $moduleinfoactiveUpcoming = module_creation::where('Status','Active')->where('isDeleted','no')->where('endDateTime', '>', now())->where('trainer_id', $user_id)->first();
            $moduleinfoactiveUpcoming = @$moduleinfoactiveUpcoming ? $moduleinfoactiveUpcoming->toArray() : array();
            if(@$moduleinfoactiveUpcoming)
            {
                $returnArr = array("status" => 0, "msg" => "You can not close this account before completion of active modules!");
                return $returnArr;
                die;
            }

            $delete = trainer::where('trainer_id', $user_id)->delete();
            if($delete)
            {
                $returnArr = array("status" => 1, "msg" => "Success!");
            }
            else
            {
                $returnArr = array("status" => 0, "msg" => "Failed!");
            }
            return $returnArr;
        }
        $returnArr = array("status" => 0, "msg" => "Failed!");
        return $returnArr;
    }
}
