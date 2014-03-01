<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
$options = array(
    'delete_type' => 'POST',
    'db_host' => 'aa15b1k1ar7s9s0.coj3k2s36zeq.us-west-2.rds.amazonaws.com',
    'db_user' => 'ebroot',
    'db_pass' => 'hugdeindia',
    'db_name' => 'hugde',
    'db_table' => 'images'
);

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
require('UploadHandlerS3.php');
//$upload_handler = new UploadHandler();

class CustomUploadHandler extends UploadHandlerS3 {

    protected function initialize() {
        $this->db = new mysql(
            $this->options['db_host'],
            $this->options['db_user'],
            $this->options['db_pass'],
            $this->options['db_name']
        );
        parent::initialize();
        $this->db->close();
    }

    protected function handle_form_data($file, $index) {
        $file->title = @$_REQUEST['title'];
		$file->userId= @$_REQUEST['userId'];
		$file->username= @$_REQUEST['username'];
        //$file->description = @$_REQUEST['description'][$index];
    }

    protected function handle_file_upload($uploaded_file, $name=null, $size, $type, $error,
            $index = null, $content_range = null) {
        $file = parent::handle_file_upload(
            $uploaded_file, $name, $size, $type, $error, $index, $content_range
        );
		
        if (empty($file->error)) {
        	//var_dump($file);
        	
            $sql = 'INSERT INTO '.$this->options['db_table'].' (originalImageUrl,thumbnailImageUrl,mediumUrl,size,type,name)'.' VALUES (?,?,?,?, ?,?)';
            $query = $this->db->prepare($sql);
            $query->bind_param(
                'sssiss',
                $file->url,
                $file->thumbnailUrl,
                $file->mediumUrl,
                $file->size,
                $file->type,
                $file->name
            );
            $query->execute();
            $file->id = $this->db->insert_id;
			
			// Insert into hugga table
			$sql = 'INSERT INTO hugga (userId,imageId,title,postedBy)'.' VALUES (?, ?,?,?)';
            $query = $this->db->prepare($sql);
            $query->bind_param(
                'iiss',
                $file->userId,
                $file->id,
                $file->title,
                $file->username
            );
            $query->execute();
            $file->id = $this->db->insert_id;
			 
			 
        }
        return $file;
    }

    protected function set_additional_file_properties($file) {
        parent::set_additional_file_properties($file);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $sql = 'SELECT `id`, `type`, `title`, `description` FROM `'
                .$this->options['db_table'].'` WHERE `name`=?';
            $query = $this->db->prepare($sql);
            $query->bind_param('s', $file->name);
            $query->execute();
            $query->bind_result(
                $id,
                $type
            );
            while ($query->fetch()) {
                $file->id = $id;
                $file->type = $type;
                $file->title = $title;
                $file->description = $description;
            }
        }
    }

    public function delete($print_response = true) {
        $response = parent::delete(false);
        foreach ($response as $name => $deleted) {
            if ($deleted) {
                $sql = 'DELETE FROM images WHERE name=?';
                $query = $this->db->prepare($sql);
                $query->bind_param('s', $name);
                $query->execute();
            }
        } 
        return $this->generate_response($response, $print_response);
    }

}

$upload_handler = new CustomUploadHandler($options);
