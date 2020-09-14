<?php
$conn = mysqli_connect('localhost', 'student', 'gnits', 'project_monitoring');

$sql = "SELECT * FROM file_upload WHERE pname='$pname'";

$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<?php
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM file_upload WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    //$filepath = $file['name'];

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        //header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        //header('Content-Length: ' . filesize('uploads/' . $file['name']));
        //readfile('uploads/' . $file['name']);

        // Now update downloads count
        /*$newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;

}
?>