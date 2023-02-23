<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    /**
     * Index Page
     * view  all data fatch in json file
     */
    public function index()
    {
        $path = storage_path() . "/app/data.json";
        $json_data = json_decode(file_get_contents($path), true);
        return view('pages.test', compact('json_data'));
    }

    /**
     * Add data to the Request object
     * return json data
     */
    public function adddata(Request $request)
    {
        try {
            //create JSON file
            $contactInfo = Storage::disk('local')->exists('data.json') ? json_decode(Storage::disk('local')->get('data.json')) : [];

            // form validation
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'name' => 'required',
                'gender' => 'required',
                'address' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => true, 'msg' => $validator->errors()]);
            }
            // file upload
            $file = $request->file('image');
            $tempname = $file->getClientOriginalExtension();
            $filename = time() . "." . $tempname;
            $path = 'upload/' . $filename;
            $file->move(public_path('upload'), $filename);

            //insert data
            $inputData = [
                'id' => $request->id,
                'name' => $request->name,
                'gender' => $request->gender,
                'address' => $request->address,
                'file' =>  $path,
            ];
            $inputData['datetime_submitted'] = date('Y-m-d H:i:s');

            //all data push in this file
            array_push($contactInfo, $inputData);
            Storage::disk('local')->put('data.json', json_encode($contactInfo));

            // print_r($inputData);die;
            return response()->json(['success' => true, 'msg' => ' Add Successfully']);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * Edit form
     * get $request id and return value
     */
    public function editData(Request $request)
    {
        // return $request;
        $id = $request->id;
        // fatch data
        $path = storage_path() . "/app/data.json";
        $jsonData = file_get_contents($path);

        // decode json data
        $data = json_decode($jsonData, true);


        $singleData = array_filter($data, function ($var) use ($id) {
            return (!empty($var['id']) && $var['id'] == $id);
        });

        //array value return
        $singleData = array_values($singleData)[0];

        return response()->json(['success' => true, 'data' => $singleData]);
    }

    /**
     * Update
     * Get form data and update
     * return success or error message
     */

    public function updateData(Request $request)
    {
        $id = $request->edit_id;
        //fatch json file data
        $path = storage_path() . "/app/data.json";


        //file update get all form data
        if (!empty($request) && !empty($id)) {
            $jsonData = file_get_contents($path);
            $data = json_decode($jsonData, true);
            foreach ($data as $key => $value) {
                if ($value['id'] == $id) {
                    if (isset($request['edit_name'])) {
                        $data[$key]['name'] = $request['edit_name'];
                    }
                    if (isset($request['edit_gender'])) {
                        $data[$key]['gender'] = $request['edit_gender'];
                    }
                    if (isset($request['edit_address'])) {
                        $data[$key]['address'] = $request['edit_address'];
                    }

                    //file upload ,if user upload new file
                    if (!empty($request['edit_image'])) {
                        if (isset($request['edit_image'])) {
                            $file = $request->file('edit_image');
                            $tempname = $file->getClientOriginalExtension();
                            $filename = time() . "." . $tempname;
                            $fpath = 'upload/' . $filename;
                            $file->move(public_path('upload'), $filename);
                            $data[$key]['file'] = $fpath;
                        }
                        $data[$key]['datetime_submitted'] = date('Y-m-d H:i:s');
                    }
                }
            }
            // update data
            $update = file_put_contents($path, json_encode($data));
            return response()->json(['success' => true, 'msg' => 'Item Update successfully']);
        } else {
            return false;
        }
    }
    /**
     * Delete
     * Get id to form delete buttom and delete item id ways
     * return  success or error message
     *
     */
    public function deleteData(Request $request)
    {
        $id = $request->delete_id;
        $path = storage_path() . "/app/data.json";
        $jsonData = file_get_contents($path);
        $data = json_decode($jsonData, true);

        $arr_index = array();
        foreach ($data as $key => $value) {
            if ($value['id'] == $id) {
                $arr_index[] = $key;
            }
        }

        foreach ($arr_index as $i) {
            unset($data[$i]);
        }

        $data = array_values($data);

        file_put_contents($path, json_encode($data));

        return response()->json(['success' => true, 'msg' => 'Item deleted Successfully']);
    }
}
