<?php

namespace App\model;

class Filter {
	private $startConnection, $connection, $data;

    public function __construct() {
        $this->startConnection = new DatabaseConnection('localhost', 'root', '', 'vida_crista');
        $this->connection = $this->startConnection->getConnection();
    }

    public function textFilter($text, $doc){
    	switch ($doc) {
    		case 'enc':
    			$sql = 'select numero, texto, url, nome from enciclica_papal inner join texto_enciclica_papal on enciclica_papal.id_enciclica = texto_enciclica_papal.id_enciclica where texto like :text';
                $url = 'enciclicas';
    			break;
    		case 'can':
    			$sql = 'select numero, texto from canodos where texto like :text';
                $url = 'canodos';
    			break;
    		case 'dou':
    			$sql = 'select numero, texto from doutrina_social where texto like :text';
                $url = 'doutrina_social';
    			break;
    		case 'cic':
    			$sql = 'select numero, texto from catecismo where texto like :text';
                $url = 'catecismo';
    			break;
    	}
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':text', "%{$text}%");
        $stmt->execute();
        $this->connection = null;

        $data['url'] = $url;
        $data['content'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $data['content'] ? $data : null;
    }
}