<?php

function redirect_to($url) {
    printf("<script>location.href='$url'</script>");
}

function secure_input($con, $data) {
    $data = mysqli_escape_string($con, $data);
    $data = mysqli_real_escape_string($con, $data);
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function runQuery($con, $query) {
    $result = mysqli_query($con, $query);
    if ($result) {
        return $result;
    } else {
        die(mysqli_error($con));
    }
}
function compressImage($source_image, $compress_image) {
    $image_info = getimagesize($source_image);
    $quality=75;
    if ($image_info['mime'] == 'image/jpeg') {
        $source_image = imagecreatefromjpeg($source_image);
        imagejpeg($source_image, $compress_image, $quality);
    } elseif ($image_info['mime'] == 'image/gif') {
        $source_image = imagecreatefromgif($source_image);
        imagegif($source_image, $compress_image, $quality);
    } elseif ($image_info['mime'] == 'image/png') {
        $source_image = imagecreatefrompng($source_image);
        imagepng($source_image, $compress_image, 6);
    }
    return $compress_image;
}
