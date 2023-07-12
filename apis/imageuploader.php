<?php

require_once '../config.php';
require_once CLASSES_DIR.'loader.php';
require_once VENDOR_DIR.'autoload.php';

use Aws\S3\S3Client;

if (isset($_FILES['multiUpload']['name'])) {

    $output = array(
        "status" => "error",
        "message" => "file upload failed"
    );

    if (empty($_FILES['multiUpload']['name'])) {
        $output['message'] = "Select file for upload.";
    } else {
        $tempFile = explode('.', $_FILES['multiUpload']['name']);
        $fileFormat = isset($tempFile[count($tempFile) - 1]) ? $tempFile[count($tempFile) - 1] : '';
        if (in_array($fileFormat, explode(',', IMAGE_FILE_FORMAT))) {
            unset($tempFile[count($tempFile) - 1]);
            $fileName = getUniqueFile(implode('-', $tempFile), $fileFormat);
            $output = createImage($fileName);
        } else {
            $output['message'] = "file format is not support.";
        }
    }
    echo json_encode($output);
    exit;
}

function getUniqueFile($fileName, $fileFormat) {
    return str_replace(array(" ", "(", ")"), array("-", "", ""), $fileName) . '_' . uniqid(rand(), true) . '.' . $fileFormat;
}

function createImage($fileName) {
      $content = $_FILES['multiUpload']['tmp_name'];
    $output = array();
    // Instantiate an Amazon S3 client 

    $s3 = new S3Client([
        'version' => 'latest',
        'region'  => AWS_REGION
    ]);
    try {
        $result = $s3->putObject([
            'Bucket' => S3_BUCKET_NAME,
            'Key'    => 'images/'.$fileName,
            'ACL'    => 'public-read',
            'SourceFile' => $content
        ]);
        $result_arr = $result->toArray();

        if (!empty($result_arr['ObjectURL'])) {
            $output['status'] = "success";
            $output['message'] = "file uploaded success.";
            $output['name'] = $fileName;
            $output['url'] = $result_arr['ObjectURL'];
        } else {
            $output['message'] = "Upload Failed! S3 Object URL not found.";
            $output['status'] = "error";
        }
    } catch (Aws\S3\Exception\S3Exception $e) {
        $output['message'] = $e->getMessage();
        $output['status'] = "error";
    }

    return $output;
}
