<?php

namespace asm\parse;

use yii\base\Component;
use Parse\ParseClient;

class Parse extends Component
{

    public $appId;
    public $restKey;
    public $masterKey;
    
    public $subclasses = [];

    public function init()
    {
        $this->registerSubclasses();
        
        $this->initClient();
        
        return parent::init();
    }
    
    private function initClient(){
        ParseClient::initialize($this->appId, $this->restKey, $this->masterKey);
    }
    
    private function registerSubclasses(){
        foreach($this->subclasses as $subclass){
            call_user_func([$subclass, 'registerSubclass']);
        }
    }

}
