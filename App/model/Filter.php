<?php

namespace App\model;

class Filter {
	private $startConnection, $connection, $data;

    public function __construct() {
        $this->startConnection = new DatabaseConnection('localhost', 'dev_vida_crista', '80ab55sd', 'VidaCrista');
        $this->connection = $this->startConnection->getConnection();
    }

    public function textFilter($text, $doc){
    	switch ($doc) {
    		case 'enc':
    			$sql = 'select paragraph_number, paragraph_text, url_text, encyclical_name from Encyclical inner join Encyclical_text on Encyclical.id_encyclical = Encyclical_text.id_encyclical where paragraph_text like :text';
                $url = 'enciclicas';
    			break;
    		case 'can':
    			$sql = 'select paragraph_number, paragraph_text from Canos where paragraph_text like :text';
                $url = 'canodos';
    			break;
    		case 'dou':
    			$sql = 'select paragraph_number, paragraph_text from Social_doctrine where paragraph_text like :text';
                $url = 'doutrina_social';
    			break;
    		case 'cic':
    			$sql = 'select paragraph_number, paragraph_text from Catechism where paragraph_text like :text';
                $url = 'catecismo';
    			break;
    	}
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':text', "%{$text}%");
        $stmt->execute();
        $this->connection = null;

        $this->data['url'] = $url;
        $this->data['content'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $this->data['content'] ? $this->data : null;
    }
}