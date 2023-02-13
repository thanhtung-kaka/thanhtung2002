<!-- văn -->
<?php
include 'connect.php';
include 'client.php';
$id = $_POST['id'];
$status = $_POST['status'];

$client = new Client();
if ($status == 0) {
    $status = 1;
    $client->update_status_client($id, $status);
    echo '<span class="status_client me-2" data-status="' . $status . '" data-id="' . $id . '"><i class="fas fa-check" title="được phép truy cập"></i></span>';
} else {
    $status = 0;
    $client->update_status_client($id, $status);
    echo '<span class="status_client me-2" data-status="' . $status . '" data-id="' . $id . '"><i class="fas fa-times" title="ngừng truy cập"></i></span>';
}
?>