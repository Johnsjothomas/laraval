<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\aspirant;
use App\Models\trainer;
use App\Models\module_creation;

class ModuleManageController extends Controller
{
   
    public function moduleList()
    {
        return view('admin.modulelist');
    }
    public function listModuleData(Request $request)
    {
        $skip = @$request->start_index ? $request->start_index : 0;
        $limit = @$request->limit_length ? $request->limit_length : 15;
        $search_by = @$request->search_by ? $request->search_by : '';
        $export_file = @$request->export_file ? $request->export_file : 0;

        $TID = $request->session()->get('Trainer_ID');
        
        $selectedFields = ["module_creations.module_Id", "module_creations.moduleTitle", "module_creations.created_at", "trainer_master.first_name", "trainer_master.second_name","module_creations.Status"];
        
       if(@$TID)
        {
           // $selectedFields[] = "module_Id AS module_id";
            $listData = module_creation::select($selectedFields)
                        ->selectRaw('(SELECT COUNT(payment_id) FROM aspirant_payment WHERE module_creations.module_Id = aspirant_payment.module_Id) AS totalAspirant')
                        ->where("module_creations.isDeleted", "no")
                        ->join("trainer_master","trainer_master.trainer_id","module_creations.trainer_id");
                        if(@$search_by)
                        {
                            $listData->where(function ($query) use ($search_by) {
                                $query->where('module_creations.moduleTitle', 'like', '%' . $search_by . '%')
                                ->orWhere('trainer_master.first_name', 'like', '%' . $search_by . '%')
                                ->orWhere('trainer_master.second_name', 'like', '%' . $search_by . '%');
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
            $listData = $listData->orderBy('module_id', 'desc')
                        ->get();
        }
        
        $listData = @$listData ? $listData->toArray() : array();
        $html = '';
        if(@$listData && $export_file == 0)
        {
            foreach ($listData as $key => $rowData) 
            {
                $html .= '<tr class="table_tr_css table_tr_jss" data_id="'. $rowData['module_Id'] .'">
                    <td>'. $rowData['module_Id'] .'</td>
                    <td>'. $rowData['moduleTitle'] .'</td>
                    <td>'. $rowData['first_name'] . ' '. $rowData['second_name'] .'</td>
                    <td>'. date("d/m/Y H:i", strtotime($rowData['created_at'])) .'</td>
                    <td>'. $rowData['totalAspirant'] .'</td>
                    <td>'. ($rowData['Status'] == 'InActive' ? "Not Published" : "Published") .'</td>
                    <td><button type="button" class="btn btn-danger delete_module_btn_jss"><span class="fa fa-trash"></span></button></td>
                </tr>';
            }
        }
        $returnArr = array("status" => 1, "html" => $html);
        if(@$listData && $export_file == 1)
        {
            $returnArr['listData'] = $listData;
        }
        return $returnArr;
    }
    public function delete_module(Request $request)
    {
       $module_id = isset($request->module_id) ? $request->module_id : 0;
       $TID = $request->session()->get('Trainer_ID');
        if(@$module_id && $TID)
        {
            $delete =  module_creation::where('module_Id',$module_id)->update(['isDeleted'=>'yes','Status' => 'InActive','deletedBy' => $TID]);
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
