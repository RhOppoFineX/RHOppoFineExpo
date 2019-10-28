<?php
/**
*	Clase para validar todos los datos de entrada.
*/
class Validator
{
    private $imageError = null;
    private $imageName = null;

    public function getImageName()
    {
        return $this->imageName;
    }

    public function getImageError()
    {
        switch ($this->imageError) {
            case 1:
                $error = 'El tipo de la imagen debe ser gif, jpg o png';
                break;
            case 2:
                $error = 'La dimensión de la imagen es incorrecta';
                break;
            case 3:
                $error = 'El tamaño de la imagen debe ser menor a 2MB';
                break;
            case 4:
                $error = 'El archivo de la imagen no existe';
                break;
            case 5:
                $error = 'El archivo no tiene nombre';
                break;
            default:
                $error = 'Ocurrió un problema con la imagen';
        }
        return $error;
    }

    public function validateForm($fields)
    {
        foreach ($fields as $index => $value) {
            $value = trim($value);
            $value = htmlentities($value);//Para ataques Xss Convierte javascript y html a texto plano
            $value = strip_tags($value);
            $fields[$index] = $value;
        }
        return $fields;
    }

    public function validateId($value)
    {
        if (filter_var($value, FILTER_VALIDATE_INT, array('min_range' => 1))) {
            return true;
        } else {
            return false;
        }
    }

    public function validateImageFile($file, $path, $name, $maxWidth, $maxHeigth)
    {
        if ($file) {
            // Se comprueba si el archivo tiene un mañana menor o igual a 2MB
            if ($file['size'] <= 2097152) {
                list($width, $height, $type) = getimagesize($file['tmp_name']);
                if ($width <= $maxWidth && $height <= $maxHeigth) {
                    // Se verifica si la imagen cumple con alguno de los formatos: 1 - GIF, 2 - JPG y 3 - PNG
                    if ($type == 1 || $type == 2 || $type == 3) {
                        // Se comprueba si el archivo tiene un nombre, sino se le asigna uno
                        if ($name) {
                            $this->imageName = $name;
                            if (!file_exists($path.$name)) {
                                $this->imageError = 4;
                            }
                            return true;
                        } else {
                            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                            $this->imageName = uniqid().'.'.$extension;
                            return true;
                        }
                    } else {
                        $this->imageError = 1;
                        return false;
                    }
                } else {
                    $this->imageError = 2;
                    return false;
                }
             } else {
                $this->imageError = 3;
                return false;
             }
        } else {
            if ($name) {
                if (file_exists($path.$name)) {
                    $this->imageName = $name;
                    return true;
                } else {
                    $this->imageError = 4;
                    return false;
                }
            } else {
                $this->imageError = 5;
                return false;
            }
        }
    }

    public function validateEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function validateDate($date){
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
            return true;
        } else {
            return false;
        }
    }

    public function validateAlphabetic($value, $minimum, $maximum)
    {
        if (preg_match('/^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{'.$minimum.','.$maximum.'}$/', $value)) {
            return true;
        } else {
            return false;
        }
    }

    public function validateAlphanumeric($value, $minimum, $maximum)
    {
        if (preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s\.]{'.$minimum.','.$maximum.'}$/', $value)) {
            return true;
        } else {
            return false;
        }
    }

    public function validateInteger($value)
    {
        if(preg_match('/^[0-9]*$/', $value)) {
            return true;
        } else {
            return false;
        }
    }

    public function validateIntegerControl($value, $minimum, $maximum)
    {
        if(preg_match('/^[1-9][0-9]{'.$minimum.','.$maximum.'}$/', $value)){
            return true;
        } else {
            return false;
        }
    }

    public function validateMoney($value)
    {
        if (preg_match('/^[0-9]+(?:\.[0-9]{1,2})?$/', $value)) {
            return true;
        } else {
            return false;
        }
    }

    // public function validatePasswordSecurity($value)
    // {
    //     if (preg_match('/^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/', $value)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function validatePassword($value)
    {
        $uppercase = preg_match('@[A-Z]@', $value);//Al menos una mayuscula
        $lowercase = preg_match('@[a-z]@', $value);//Al menos una minuscula
        $number    = preg_match('@[0-9]@', $value);//Al menos numero
        $special   = preg_match("/\W/", $value);//Al menos un caracter especial 

        if (strlen($value) > 7 && $uppercase && $lowercase && $number && $special) {
            return true;
        } else {
            return false;
        }
    }    

    public function saveFile($file, $path, $name)
    {
        if (file_exists($path)) {
            if (move_uploaded_file($file['tmp_name'], $path.$name)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function deleteFile($path, $name)
    {
        if (file_exists($path)) {
            if (@unlink($path.$name)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function validateCeroOrOne($value)
    {
        if($value == '0' || $value == '1'){
            return true;
        } else {
            return false;
        }
    }

    public function validatePhoneNumber($value){
        if(preg_match("^[0-9]{3,4}(-[0-9]{3,4})?$")){
            return true;
        } else {
            return false;
        }
    }
}
?>
