<?php


class QuotesTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Quotes');
    }

    public function getSymbolByKey($key){
    	$q = Doctrine_Query::create()
                ->from('Quotes q')
                ->where('q.symbol = ?', $key);
        return $q->fetchOne();
    }
}