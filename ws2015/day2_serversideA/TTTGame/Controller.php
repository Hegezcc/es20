<?php

namespace TTTGame;

class Controller {
    public static function upload($file)
    {
        global $messages, $user;

        $size = getimagesize($file['tmp_name']);

        if (!$size || $size['mime'] !== 'image/jpeg') {
            return false;
        }

        $src = imagecreatefromjpeg($file['tmp_name']);
        $dst = imagecreatetruecolor(60, 60);

        imagecopyresized($dst, $src, 0, 0, 0, 0, 60, 60, $size[0], $size[1]);
        imagedestroy($src);

        $fileName = uniqid();

        imagejpeg($dst, __DIR__ . "/../pictures/$fileName.jpg");
        imagedestroy($dst);

        $user->avatar = $fileName;

        return true;
    }
}