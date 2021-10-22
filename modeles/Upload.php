<?php

class Upload
{

    protected $path;


    protected $formats;

    public function upload( $file): string
    {
        // File name
        $filename = $_FILES['$file']['name'];

        // Location
        $target_file = 'images/' . $filename;

        // file extension
        $file_extension = pathinfo(
            $target_file,
            PATHINFO_EXTENSION
        );

        $fichierInfo = pathinfo($_FILES['fichier']['name']);
        // extraire l'extension de fichier pour le comparer
        $file_extension = strtolower($file_extension);

        // Valid image extension
        $valid_extension = array("png", "jpeg", "jpg", "gif"
        );

        if (in_array($file_extension,
            $valid_extension
        )) {

            // Upload file
            move_uploaded_file(
                $_FILES['fichier']['tmp_name'],
                $target_file
            );
        } else {
            echo 'Vous devez envoyer une image!';
        }
        
        return $target_file;
    }
}

?>


