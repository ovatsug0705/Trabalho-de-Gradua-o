<?php

namespace App\model;

/**
 * Filter model class
 *
 * Filter texts in documents in the database
 *
 * @copyright  2019 Gustavo da Silva Gomes
 * @author     Gustavo da Silva Gomes <ovatsug8055@hotmail.com>
 * @since      Class available since Release 1.0.0
 */
class Filter {
	private $startConnection, $connection, $data;

    /**
     * Filter class Constructor
     *
     * @return void
     */
    public function __construct() 
    {
        $this->startConnection = new DatabaseConnection(getenv('APP_HOST'), getenv('APP_DB_USER'), getenv('APP_DB_PASS'), getenv('APP_DB_NAME'));
        $this->connection = $this->startConnection->getConnection();
    }

    /**
     * Filter texts in documents in the database
     * 
     * @param string $text text to be searched
     * @param string $doc name of the document
     * @return PDO
     */
    public function textFilter($text, $doc)
    {
    	switch ($doc) {
    		case 'enciclica':
    			$sql = 'select paragraph_number, paragraph_text, url_text, encyclical_name from Encyclical inner join Encyclical_text on Encyclical.id_encyclical = Encyclical_text.id_encyclical where paragraph_text like :text';
    			break;
    		case 'canodo':
    			$sql = 'select paragraph_number, paragraph_text from Canos where paragraph_text like :text';
    			break;
    		case 'doutrina_social':
    			$sql = 'select paragraph_number, paragraph_text from Social_doctrine where paragraph_text like :text';
    			break;
    		case 'catecismo':
    			$sql = 'select paragraph_number, paragraph_text from Catechism where paragraph_text like :text';
                break;
            default :
                $sql = '';
    	}
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':text', "%{$text}%");
        $stmt->execute();
        $this->connection = null;

        $this->data['doc'] = $doc;
        $this->data['content'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $this->data['text'] = $text;

        return $this->data;
    }
}