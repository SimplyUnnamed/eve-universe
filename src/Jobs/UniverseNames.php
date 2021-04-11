<?php


namespace SimplyUnnamed\Seat\EveUniverse\Jobs;


use Seat\Eveapi\Jobs\EsiBase;
use Seat\Eveapi\Models\Universe\UniverseName;

class UniverseNames extends EsiBase
{
    protected $ids = [];

    /**
     * The maximum number of entity ids we can request resolution for.
     */
    protected $items_id_limit = 1000;

    /**
     * @var string
     */
    protected $method = 'post';

    /**
     * @var string
     */
    protected $endpoint = '/universe/names/';

    /**
     * @var string
     */
    protected $version = 'v3';

    /**
     * @var array
     */
    protected $tags = ['public', 'universe'];

    /**
     * @var \Illuminate\Support\Collection
     */
    protected $entity_ids;

    /**
     * @var \Illuminate\Support\Collection
     */
    protected $existing_entity_ids;


    public function __construct($ids){
        $this->ids = $ids;
    }

    public function handle()
    {
        $this->existing_entity_ids = UniverseName::select('entity_id')
            ->distinct()
            ->get()
            ->pluck('entity_id');

        $this->entity_ids = collect($this->ids);

        $this->entity_ids->flatten()->diff($this->existing_entity_ids)->values()->chunk($this->items_id_limit)->each(function ($chunk) {

            $this->request_body = collect($chunk->values()->all())->unique()->values()->all();

            $resolutions = $this->retrieve();

            collect($resolutions)->each(function ($resolution) {

                UniverseName::firstOrNew([
                    'entity_id' => $resolution->id,
                    'category' => $resolution->category,
                ])->fill([
                    'name'     => $resolution->name,
                ])->save();

            });

        });
    }

}