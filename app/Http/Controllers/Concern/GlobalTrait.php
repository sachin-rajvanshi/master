<?php
namespace App\Http\Controllers\Concern;

use App\Models\User;
use App\Exceptions\RedirectException;

Trait GlobalTrait
{
	/**
	* Upload Files
	*
	* @category Admin  Management
	* @package  Admin  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	protected function filesUpload($data, $old_file) {
        if($data->file) {
            $file = basename($old_file);
            if($file) {
              if(file_exists(public_path('uploaded_doc/').$file)){
                unlink(public_path("uploaded_doc/").$file);
              }
            }
            $filename      = $data->file->getClientOriginalName();
            $fileExtension = $data->file->getClientOriginalExtension();
            $imageName     = base64_encode(str_replace(' ', '', $filename)).date('ymdhis').'.'.$fileExtension;
            $return        = $data->file('file')->move(
            base_path() . '/public/uploaded_doc/', $imageName
            );
            $image_path =asset('/public/uploaded_doc/'. $imageName);
        } else {
            $image_path = $old_file;
        }
        return $image_path;
    }
}