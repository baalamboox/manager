<?php
    require_once 'Connection.php';
    class Manager extends Connection {



        public function add_file($files_data) {
            $connection = Connection::connection();
            $sql = 'INSERT INTO files_table(u_id, category_id, f_name, f_type, f_path) VALUES (?, ?, ?, ?, ?)';
            $query = $connection->prepare($sql);
            $query->bind_param("iisss", $files_data['user_id'], $files_data['category_id'], $files_data['file_name'], $files_data['file_type'], $files_data['file_path']);
            $result = $query->execute();
            $query->close();
            return $result;
        }






        public function obtenenNombreArchivo ($idArchivo) {
            $connection = Connection::connection();
            $sql ="SELECT f_name FROM files_table WHERE id_archivo = '$idArchivo'";   
            $result = mysqli_query($connection, $sql);
            return  mysqli_fetch_array($result)['f_name'];
        }
        public function eliminarRegistroArchivo($idArchivo){
            $connection = Connection::connection();
            $sql = "DELETE FROM files_table WHERE id_archivo = ?";
            $query = $connection->prepare($sql);
            $query->bind_param('i', $idArchivo);
            $result = $query->execute();
            $query->close();
            return $result;
        }

        public function obtenerRutaArchivo($idArchivo) {
            $connection = Connection::connection();
            $sql = "SELECT f_name, f_type FROM files_table WHERE id_archivo = '$idArchivo'";
            $result = mysqli_query($connection, $sql);
            $datos = mysqli_fetch_array($result);
            $nombreArchivo = $datos['f_name'];
            $extension = $datos['f_type'];
            return self::tipoArchivo($nombreArchivo, $extension);
        }
        public function tipoArchivo($f_name, $extension) {
            $idUsuario = $_SESSION['idUsuario'];
            $f_path = "../archivos/".$idUsuario."/".$f_name;
            switch ($extension) {
                case 'png':
                return '<img src="'.$f_path.'" width = "50%";>';
                break;
                case 'jpg':
                return '<img src="'.$f_path.'" width = "50%";>';
                break;
                case 'txt':
                # code...
                break;
                case 'pdf':
                return '<embed src="'.$f_path.'#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" heigth="100%"/>';
                break;
                case 'mp3':
                return '<video src="'.$f_path.'"></video>';
                break;
                case 'mp4':
                return '<video src="'.$f_path.'" controls width="100%" heigth="800px"></video>';
                break;
                case 'sql':
                # code...
                break;
                case 'rar':
                # code...
                break; 
                case 'docx':
                # code...
                break;
                case 'pptx':
                # code...
                break;
                default:
                # code...
                break;
            }
        }
    }
?>