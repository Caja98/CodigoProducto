<?php
	class Producto {
        public static function get($id) {
            return "<br/>Se ejecutó Producto::get({$id}) <br/>";
        }
    
        public static function post($data) {
            return "<br/>Se ejecutó Producto::post con datos: " . json_encode($data) . "<br/>";
        }
    
        public static function put($data) {
            return "<br/>Se ejecutó Producto::put con datos: " . json_encode($data) . "<br/>";
        }
    
        public static function delete($id) {
            return "<br/>Se ejecutó Producto::delete({$id}) <br/>";
        }
    }
?>

















