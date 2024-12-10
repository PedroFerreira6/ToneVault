<?php

class Database
{

    private static $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    'mysql:host=sql102.infinityfree.com;port=3306;dbname=if0_37791864_tonevault',
                    'if0_37791864', //USERNAME
                    'macacos2000', //PASSOWRD
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Modo ERRO
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Retorno de Argumentod
                    ]
                );
            } catch (PDOException $e) {
                die("ERRO DE CONEXÃO : " . $e->getMessage());
            }
        }
        
        return self::$instance;
    }
}