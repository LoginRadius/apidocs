<?php

require_once '../config.php';
require_once CLASSES_DIR.'loader.php';
require_once VENDOR_DIR.'autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;

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

function createLocalImage($fileName) {
    $output = array();
    if (move_uploaded_file($_FILES['multiUpload']['tmp_name'], "../" . AZURE_CONTAINER . "/" . $fileName)) {
        $output['status'] = "success";
        $output['message'] = "file uploaded success.";
        $output['name'] = $fileName;
        $output['url'] = ROOT_URL . AZURE_CONTAINER . "/" . $fileName;
    } else {
        $output['message'] = "An error ocure";
        $output['status'] = "error";
    }

    return $output;
}

function createImage($fileName) {
    $connectionString = "DefaultEndpointsProtocol=" . AZURE_PROTOCOL . ";AccountName=" . AZURE_ACCOUNT_NAME . ";AccountKey=" . AZURE_ACCOUNT_KEY;
    $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
    $content = fopen($_FILES['multiUpload']['tmp_name'], "r");
    $output = array();
    try {
        //Upload blob
        $blobRestProxy->createBlockBlob(AZURE_CONTAINER, $fileName, $content);
        $output['status'] = "success";
        $output['message'] = "file uploaded success.";
        $output['name'] = $fileName;
        $output['url'] = AZURE_PROTOCOL . "://" . AZURE_ACCOUNT_DOMAIN . AZURE_CONTAINER . "/" . $fileName;
    } catch (ServiceException $e) {
        // Handle exception based on error codes and messages.
        // Error codes and messages are here:
        // http://msdn.microsoft.com/library/azure/dd179439.aspx
        $output['message'] = $e->getMessage();
        $output['status'] = "error";
        createContainer();
        $output = createImage($fileName);
    }
    return $output;
}

function createContainer() {
    // Create blob REST proxy.
    $connectionString = "DefaultEndpointsProtocol=" . AZURE_PROTOCOL . ";AccountName=" . AZURE_ACCOUNT_NAME . ";AccountKey=" . AZURE_ACCOUNT_KEY;

    $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);


// OPTIONAL: Set public access policy and metadata.
// Create container options object.
    $createContainerOptions = new CreateContainerOptions();

// Set public access policy. Possible values are
// PublicAccessType::CONTAINER_AND_BLOBS and PublicAccessType::BLOBS_ONLY.
// CONTAINER_AND_BLOBS:
// Specifies full public read access for container and blob data.
// proxys can enumerate blobs within the container via anonymous
// request, but cannot enumerate containers within the storage account.
//
// BLOBS_ONLY:
// Specifies public read access for blobs. Blob data within this
// container can be read via anonymous request, but container data is not
// available. proxys cannot enumerate blobs within the container via
// anonymous request.
// If this value is not specified in the request, container data is
// private to the account owner.
    $createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);
    try {
        // Create container.
        $blobRestProxy->createContainer(AZURE_CONTAINER, $createContainerOptions);
        $output['status'] = "success";
        $output['message'] = "created " . AZURE_CONTAINER . " container successfully.";
    } catch (ServiceException $e) {
        // Handle exception based on error codes and messages.
        // Error codes and messages are here:
        // http://msdn.microsoft.com/library/azure/dd179439.aspx
        $output['status'] = "error";
        $output['message'] = $e->getMessage();
    }
    return $output;
}
