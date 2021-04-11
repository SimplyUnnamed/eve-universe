<?php


namespace SimplyUnnamed\Seat\EveUniverse\Jobs;


use Illuminate\Support\Arr;
use Seat\Eveapi\Jobs\EsiBase;

class UniverseSearch extends EsiBase
{

    private $type = '';

    /**
     * @var string
     */
    protected $method = 'get';

    /**
     * @var string
     */
    protected $endpoint = '/search/';

    /**
     * @var int
     */
    protected $version = 'latest';

    /**
     * @var array
     */
    protected $tags = [];

    public function __construct(String $search = '', String $type='character'){
        $this->type=$type;
        $this->tags[] = $type;
        $this->query_string = [
            'search' => $search,
            'categories' => [$type]
        ];
    }
    public function handle()
    {
        $ids = $this->retrieve();

        if($ids->count() == 0){
            return;
        }else{
            UniverseNames::dispatchNow(Arr::get($ids->getArrayCopy(), $this->type));
        }
    }
}